import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';

class DetailProfilWarga extends StatefulWidget {
  final int wargaId;

  const DetailProfilWarga({super.key, required this.wargaId});

  @override
  _DetailProfilWargastate createState() => _DetailProfilWargastate();
}

class _DetailProfilWargastate extends State<DetailProfilWarga> {
  TextEditingController nameController = TextEditingController();
  TextEditingController houseNumberController = TextEditingController();
  TextEditingController blockController = TextEditingController();
  TextEditingController phoneNumberController = TextEditingController();

  @override
  void initState() {
    super.initState();
    fetchWargaDetails();
  }

  Future<void> fetchWargaDetails() async {
    final response = await http.get(
      Uri.parse('https://your-api-url.com/getWargaDetails?id=${widget.wargaId}'),
    );

    if (response.statusCode == 200) {
      final data = json.decode(response.body);
      setState(() {
        nameController.text = data['nama'];
        houseNumberController.text = data['no_rumah'];
        blockController.text = data['blok'];
        phoneNumberController.text = data['no_hp'];
      });
    } else {
      throw Exception('Failed to load warga details');
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor('#F4EBE8'),
      appBar: AppBar(
        title: const Text(
          'Edit Profil Warga',
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
          children: [
            Expanded(
              child: Container(
                padding: const EdgeInsets.fromLTRB(20.0, 10.0, 20.0, 20.0),
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(30.0),
                  color: Colors.grey[400],
                ),
                child: Column(
                  children: [
                    const SizedBox(height: 20.0),
                    const CircleAvatar(
                      radius: 50.0,
                      backgroundImage: AssetImage('assets/profile-pic.png'),
                    ),
                    const SizedBox(height: 20.0),
                    TextField(
                      controller: nameController,
                      decoration: const InputDecoration(
                        labelText: 'Nama',
                        border: OutlineInputBorder(),
                      ),
                    ),
                    const SizedBox(height: 20.0),
                    TextField(
                      controller: houseNumberController,
                      decoration: const InputDecoration(
                        labelText: 'No. Rumah',
                        border: OutlineInputBorder(),
                      ),
                    ),
                    const SizedBox(height: 20.0),
                    TextField(
                      controller: blockController,
                      decoration: const InputDecoration(
                        labelText: 'Blok',
                        border: OutlineInputBorder(),
                      ),
                    ),
                    const SizedBox(height: 20.0),
                    TextField(
                      controller: phoneNumberController,
                      decoration: const InputDecoration(
                        labelText: 'No. HP',
                        border: OutlineInputBorder(),
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton.extended(
        onPressed: () {
          // Tambahkan kode untuk menangani aksi ketika tombol 'Selesai' ditekan
        },
        label: const Text('Selesai'),
        icon: const Icon(Icons.check),
        backgroundColor: HexColor("#FE8660"),
      ),
      floatingActionButtonLocation: FloatingActionButtonLocation.endFloat,
    );
  }
}

class HexColor extends Color {
  static int _getColorFromHex(String hexColor) {
    hexColor = hexColor.toUpperCase().replaceAll('#', '');
    if (hexColor.length == 6) {
      hexColor = 'FF$hexColor';
    }
    return int.parse(hexColor, radix: 16);
  }

  HexColor(final String hexColor) : super(_getColorFromHex(hexColor));
}
