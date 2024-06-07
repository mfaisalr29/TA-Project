import 'package:flutter/material.dart';
import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';
import 'package:pro_tav1/main.dart';

void main() {
  runApp(const MaterialApp(
    home: ProfilWarga(),
  ));
}

class ProfilWarga extends StatefulWidget {
  const ProfilWarga({super.key});
  @override
  _ProfilWargastate createState() => _ProfilWargastate();
}

class _ProfilWargastate extends State<ProfilWarga> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor('#F4EBE8'),
      appBar: AppBar(
        title: const Text(
          'Profil Warga',
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
                    Row(
                      children: [
                        Expanded(
                          child: TextField(
                            decoration: InputDecoration(
                              hintText: 'Masukkan nama...',
                              border: OutlineInputBorder(
                                borderSide: const BorderSide(color: Colors.black),
                                borderRadius: BorderRadius.circular(30.0),
                              ),
                              focusedBorder: OutlineInputBorder(
                                borderSide: const BorderSide(color: Colors.black),
                                borderRadius: BorderRadius.circular(30.0),
                              ),
                              enabledBorder: OutlineInputBorder(
                                borderSide: const BorderSide(color: Colors.black),
                                borderRadius: BorderRadius.circular(30.0),
                              ),
                              prefixIcon: Icon(
                                MdiIcons.magnify,
                                color: Colors.black,
                                size: 30.0,
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                    const SizedBox(height: 20.0),
                    const Row(
                      children: [
                        Expanded(
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                'Nama warga 1',
                                style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontFamily: 'Roboto',
                                  fontSize: 20.0,
                                ),
                              ),
                            ],
                          ),
                        ),
                      ],
                    ),
                    const SizedBox(height: 20.0),
                    const Row(
                      children: [
                        Expanded(
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                'Nama warga 2',
                                style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontFamily: 'Roboto',
                                  fontSize: 20.0,
                                ),
                              ),
                            ],
                          ),
                        ),
                      ],
                    )
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
      floatingActionButton: Transform.scale(
        scale: 1.3,
        child: FloatingActionButton(
          onPressed: () {},
          backgroundColor: HexColor("#FE8660"),
          foregroundColor: HexColor('#253793'),
          shape: const CircleBorder(),
          elevation: 10.0,
          splashColor: HexColor('#253793'),
          child: Icon(MdiIcons.plusThick),
        ),
      ),
      floatingActionButtonLocation: FloatingActionButtonLocation.endFloat,
    );
  }
}