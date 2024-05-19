import 'package:flutter/material.dart';
import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';
import 'package:firebase_database/firebase_database.dart';
import 'main.dart';

void main() {
  runApp(const MaterialApp(
    home: StatusAlat(),
  ));
}

class StatusAlat extends StatefulWidget {
  const StatusAlat({Key? key}) : super(key: key);

  @override
  _StatusAlatState createState() => _StatusAlatState();
}

class _StatusAlatState extends State<StatusAlat> {
  final DatabaseReference _database = FirebaseDatabase.instance.reference();

  bool isReservoirAtasEmpty = false;
  bool isReservoirBawahEmpty = false;
  int isBorBesarOn = 0;
  int isBorKecilOn = 0;
  int isPompaDorongOn = 0;
  bool isAutoMode = true;

  @override
  void initState() {
    super.initState();
    // Mendengarkan perubahan data pada Firebase Realtime Database
    _database.child('ControlSystem').onValue.listen((event) {
      var value = event.snapshot.value;
      if (value != null && value is Map) {
        setState(() {
          isReservoirAtasEmpty = value['Reservoir1']?['Radar'] == 1;
          isReservoirBawahEmpty = value['Reservoir2']?['RadarPompa'] == 1;
          if (!isAutoMode) {
            isBorBesarOn = value['Reservoir2']?['Relay1'] ?? 0;
            isBorKecilOn = value['Reservoir2']?['Relay2'] ?? 0;
            isPompaDorongOn = value['Reservoir2']?['Relay3'] ?? 0;
          } else {
            // Perbarui nilai tombol berdasarkan data dari database
            isBorBesarOn = value['Reservoir2']?['Relay1'] ?? isBorBesarOn;
            isBorKecilOn = value['Reservoir2']?['Relay2'] ?? isBorKecilOn;
            isPompaDorongOn = value['Reservoir2']?['Relay3'] ?? isPompaDorongOn;
          }
        });
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor('#F4EBE8'),
      appBar: AppBar(
        title: const Text(
          'Kondisi Air dan Alat',
          style: TextStyle(
            color: Colors.black,
            fontFamily: 'Roboto',
            fontWeight: FontWeight.bold,
          ),
        ),
        centerTitle: true,
        backgroundColor: HexColor('#F4EBE8'),
        elevation: 0.0,
        leading: IconButton(
          icon: Icon(MdiIcons.arrowLeft),
          iconSize: 40.0,
          alignment: Alignment.topLeft,
          onPressed: () {
            Navigator.pop(context);
          },
        ),
      ),
      body: Padding(
        padding: const EdgeInsets.all(20.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            _buildIndicator(
                'Reservoir Atas', isReservoirAtasEmpty, MdiIcons.waterPump),
            const SizedBox(height: 20),
            _buildIndicator(
                'Reservoir Bawah', isReservoirBawahEmpty, MdiIcons.waterPump),
            const SizedBox(height: 20),
            Expanded(
              child: GridView.count(
                crossAxisCount: 2,
                mainAxisSpacing: 20.0,
                crossAxisSpacing: 20.0,
                children: [
                  _buildControlButton('Bor Besar', isBorBesarOn == 1),
                  _buildControlButton('Bor Kecil', isBorKecilOn == 1),
                  _buildControlButton('Pompa Dorong', isPompaDorongOn == 1),
                  _buildModeControlButton(isAutoMode),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildIndicator(String name, bool isEmpty, IconData iconData) {
    IconData indicatorIcon =
        isEmpty ? MdiIcons.waterPumpOff : MdiIcons.waterPump;
    Color indicatorColor = isEmpty ? Colors.grey : HexColor('#253793');
    String statusText = isEmpty ? 'TIDAK FULL' : 'FULL';
    return Container(
      height: 100,
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(30.0),
        color: indicatorColor,
      ),
      child: Row(
        children: [
          SizedBox(
            width: 60,
            child: Icon(
              indicatorIcon,
              color: Colors.white,
              size: 40,
            ),
          ),
          const SizedBox(width: 10),
          Expanded(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  name,
                  style: const TextStyle(
                    color: Colors.white,
                    fontSize: 20.0,
                    fontFamily: 'Bebas Neue',
                  ),
                ),
                const SizedBox(height: 5),
                Text(
                  statusText,
                  style: const TextStyle(
                    color: Colors.white,
                    fontWeight: FontWeight.bold,
                    fontSize: 25.0,
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }

  void _updateData(String path, int value) {
    _database.child(path).set(value).then((_) {
      setState(() {});
    });
  }

  Widget _buildControlButton(String name, bool isOn) {
    Color buttonColor = Colors.grey; // Default color
    if (isAutoMode && isOn) {
      buttonColor = HexColor('#3D4B93'); // Blue color when ON in AUTO mode
    } else if (isAutoMode && !isOn) {
      buttonColor = Colors.grey
          .withOpacity(0.5); // Light gray color when OFF in AUTO mode
    } else if (!isAutoMode && isOn) {
      buttonColor =
          HexColor('#253793'); // Dark blue color when ON in MANUAL mode
    } else if (!isAutoMode && !isOn) {
      buttonColor = Colors.grey; // Dark gray color when OFF in MANUAL mode
    }
    return SizedBox(
      width: 100,
      height: 100,
      child: ElevatedButton.icon(
        onPressed: isAutoMode ? null : () => _toggleButton(name),
        style: ButtonStyle(
          backgroundColor: MaterialStateProperty.all<Color>(buttonColor),
          shape: MaterialStateProperty.all<OutlinedBorder>(
            const CircleBorder(),
          ),
        ),
        icon: Icon(
          isOn ? MdiIcons.lightbulbOn : MdiIcons.lightbulbOff,
          size: 40.0,
          color: Colors.white,
        ),
        label: Text(
          name,
          style: const TextStyle(
            fontSize: 15.0,
            fontWeight: FontWeight.bold,
            color: Colors.white,
          ),
        ),
      ),
    );
  }

  Widget _buildModeControlButton(bool isAuto) {
    return SizedBox(
      width: 100.0,
      height: 100.0,
      child: ElevatedButton(
        onPressed: () {
          setState(() {
            isAutoMode = !isAutoMode;
          });
        },
        style: ElevatedButton.styleFrom(
          backgroundColor: HexColor('#FE8660'),
          shape: const CircleBorder(),
          padding: EdgeInsets.zero,
        ),
        child: Text(
          isAuto ? 'AUTO' : 'MANUAL',
          style: const TextStyle(
            color: Colors.black,
            fontFamily: 'Bebas Neue',
            fontWeight: FontWeight.bold,
          ),
        ),
      ),
    );
  }

  void _toggleButton(String name) {
    switch (name) {
      case 'Bor Besar':
        isBorBesarOn = isBorBesarOn == 1 ? 0 : 1;
        _updateData('ControlSystem/Reservoir2/Relay1', isBorBesarOn);
        break;
      case 'Bor Kecil':
        isBorKecilOn = isBorKecilOn == 1 ? 0 : 1;
        _updateData('ControlSystem/Reservoir2/Relay2', isBorKecilOn);
        break;
      case 'Pompa Dorong':
        isPompaDorongOn = isPompaDorongOn == 1 ? 0 : 1;
        _updateData('ControlSystem/Reservoir2/Relay3', isPompaDorongOn);
        break;
    }
  }
}
