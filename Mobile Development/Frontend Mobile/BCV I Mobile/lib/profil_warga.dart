// import 'package:flutter/material.dart';
// import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';
// import 'detail_profil.dart';
// import 'package:http/http.dart' as http;
// import 'dart:convert';

// void main() {
//   runApp(MaterialApp(
//     home: ProfilWarga(),
//   ));
// }

// class ProfilWarga extends StatefulWidget {
//   const ProfilWarga({Key? key}) : super(key: key);
//   @override
//   _ProfilWargaState createState() => _ProfilWargaState();
// }

// class _ProfilWargaState extends State<ProfilWarga> {
//   List<String> _namaWarga = [];

//   @override
//   void initState() {
//     super.initState();
//     _getData();
//   }

//   void _getData() async {
//     try {
//       final response = await http.get(Uri.parse('URL_API_ANDA'));
//       if (response.statusCode == 200) {
//         final data = json.decode(response.body);
//         List<dynamic> namaWargaJson = data['namaWarga'];
//         List<String> namaWarga = [];
//         namaWargaJson.forEach((nama) {
//           namaWarga.add(nama.toString());
//         });
//         setState(() {
//           _namaWarga = namaWarga;
//         });
//       }
//     } catch (e) {
//       print('Error: $e');
//     }
//   }

//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//       backgroundColor: HexColor('#F4EBE8'),
//       appBar: AppBar(
//         title: const Text(
//           'Profil Warga',
//           style: TextStyle(
//             color: Colors.black,
//             fontFamily: 'Roboto',
//             fontWeight: FontWeight.bold,
//           ),
//         ),
//         centerTitle: true,
//         backgroundColor: HexColor('#F4EBE8'),
//         elevation: 0.0,
//         leading: IconButton(
//           icon: Icon(MdiIcons.arrowLeft),
//           iconSize: 40.0,
//           alignment: Alignment.topLeft,
//           onPressed: () {
//             Navigator.pop(context);
//           },
//         ),
//       ),
//       body: Padding(
//         padding: const EdgeInsets.all(20.0),
//         child: Column(
//           children: [
//             Expanded(
//               child: Container(
//                 padding: const EdgeInsets.fromLTRB(20.0, 10.0, 20.0, 20.0),
//                 decoration: BoxDecoration(
//                   borderRadius: BorderRadius.circular(30.0),
//                   color: Colors.grey[400],
//                 ),
//                 child: ListView.builder(
//                   itemCount: _namaWarga.length,
//                   itemBuilder: (context, index) {
//                     return _buildWargaRow(_namaWarga[index]);
//                   },
//                 ),
//               ),
//             ),
//           ],
//         ),
//       ),
//       floatingActionButton: Transform.scale(
//         scale: 1.3,
//         child: FloatingActionButton(
//           onPressed: () {},
//           backgroundColor: HexColor("#FE8660"),
//           foregroundColor: HexColor('#253793'),
//           shape: const CircleBorder(),
//           elevation: 10.0,
//           splashColor: HexColor('#253793'),
//           child: Icon(MdiIcons.plusThick),
//         ),
//       ),
//       floatingActionButtonLocation: FloatingActionButtonLocation.endFloat,
//     );
//   }

//   Widget _buildWargaRow(String wargaName) {
//     return InkWell(
//       onTap: () {
//         Navigator.push(
//           context,
//           MaterialPageRoute(
//             builder: (context) => DetailProfilWarga(wargaName: wargaName),
//           ),
//         );
//       },
//       child: Row(
//         children: [
//           Expanded(
//             child: Column(
//               crossAxisAlignment: CrossAxisAlignment.start,
//               children: [
//                 Text(
//                   wargaName,
//                   style: const TextStyle(
//                     fontWeight: FontWeight.bold,
//                     fontFamily: 'Roboto',
//                     fontSize: 20.0,
//                   ),
//                 ),
//               ],
//             ),
//           ),
//         ],
//       ),
//     );
//   }
// }

// class HexColor extends Color {
//   static int _getColorFromHex(String hexColor) {
//     hexColor = hexColor.toUpperCase().replaceAll('#', '');
//     if (hexColor.length == 6) {
//       hexColor = 'FF$hexColor';
//     }
//     return int.parse(hexColor, radix: 16);
//   }

//   HexColor(final String hexColor) : super(_getColorFromHex(hexColor));
// }
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
                                borderSide:
                                    const BorderSide(color: Colors.black),
                                borderRadius: BorderRadius.circular(30.0),
                              ),
                              focusedBorder: OutlineInputBorder(
                                borderSide:
                                    const BorderSide(color: Colors.black),
                                borderRadius: BorderRadius.circular(30.0),
                              ),
                              enabledBorder: OutlineInputBorder(
                                borderSide:
                                    const BorderSide(color: Colors.black),
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
