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
  bool isBorBesarOn = false;
  bool isBorKecilOn = false;
  bool isPompaDorongOn = false;
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
            isBorBesarOn = value['Reservoir2']?['RelayBorBesar'] ?? false;
            isBorKecilOn = value['Reservoir2']?['RelayBorKecil'] ?? false;
            isPompaDorongOn = value['Reservoir2']?['RelayPompa'] ?? false;
          } else {
            // Perbarui nilai tombol berdasarkan data dari database
            isBorBesarOn =
                value['Reservoir2']?['RelayBorBesar'] ?? isBorBesarOn;
            isBorKecilOn =
                value['Reservoir2']?['RelayBorKecil'] ?? isBorKecilOn;
            isPompaDorongOn =
                value['Reservoir2']?['RelayPompa'] ?? isPompaDorongOn;
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
                  _buildControlButton('Bor Besar', isBorBesarOn),
                  _buildControlButton('Bor Kecil', isBorKecilOn),
                  _buildControlButton('Pompa Dorong', isPompaDorongOn),
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

  void _updateData(String path, bool value) {
    _database.child(path).set(value).then((_) {
      setState(() {});
    });
  }

  Widget _buildControlButton(String name, bool isOn) {
    Color buttonColor = Colors.grey; // Default color
    if (isAutoMode && isOn) {
      buttonColor = HexColor('#87CEEB'); // Blue color when ON in AUTO mode
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
        isBorBesarOn = !isBorBesarOn;
        _updateData('ControlSystem/Reservoir2/RelayBorBesar', isBorBesarOn);
        break;
      case 'Bor Kecil':
        isBorKecilOn = !isBorKecilOn;
        _updateData('ControlSystem/Reservoir2/RelayBorKecil', isBorKecilOn);
        break;
      case 'Pompa Dorong':
        isPompaDorongOn = !isPompaDorongOn;
        _updateData('ControlSystem/Reservoir2/RelayPompa', isPompaDorongOn);
        break;
    }
  }
}