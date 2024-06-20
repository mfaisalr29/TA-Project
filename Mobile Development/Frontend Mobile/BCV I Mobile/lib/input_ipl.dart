import 'package:flutter/material.dart';
import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';
import 'package:image_picker/image_picker.dart';
import 'dart:convert';
import 'dart:io';
import 'package:http/http.dart' as http;
import 'services/api_service.dart'; // Import ApiService

void main() {
  runApp(const MaterialApp(
    home: InputIPL(),
  ));
}

class InputIPL extends StatefulWidget {
  const InputIPL({super.key});

  @override
  _InputIPLstate createState() => _InputIPLstate();
}

class _InputIPLstate extends State<InputIPL> {
  final TextEditingController namaController = TextEditingController();
  File? _image;
  final picker = ImagePicker();

  String? _nama;

  List<String> blokList = ['A', 'B', 'C'];
  List<String> nomorKavlingList = [];
  String? selectedBlok;
  String? selectedNomorKavling;
  String meterAwal = "";

  final ApiService _apiService = ApiService(); // Instantiate ApiService

  // @override
  // void initState() {
  //   super.initState();
  //   _submitData();
  // }

  // Future<void> _fetchName() async{
  //   try{
  //     final String fetchedName = await _apiService.getNameBills(selectedNomorKavling.text, selectedBlok.text);
  //     setState(() {
  //       _nama = fetchedName;
  //     });    
  //   } catch(e) {
  //       print(e);
  //   }
  // }

  void fetchNomorKavlingList(String blok) {
    print('Fetching nomor kavling untuk blok: $blok');
    if (blok == 'A') {
      setState(() {
        nomorKavlingList = ['A1'];
        print('Nomor kavling untuk Blok A: $nomorKavlingList');
      });
    } else if (blok == 'B') {
      setState(() {
        nomorKavlingList = ['B1', 'B2'];
        print('Nomor kavling untuk Blok B: $nomorKavlingList');
      });
    } else if (blok == 'C') {
      setState(() {
        nomorKavlingList = ['C1', 'C2'];
        print('Nomor kavling untuk Blok C: $nomorKavlingList');
      });
    }
  }

  void _submitData() async {
    final response = await _apiService.getNameBills(selectedNomorKavling!, selectedBlok!);

    setState(() {
      _nama = response;
      namaController.text = _nama!;
    });
  }



  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor('#F4EBE8'),
      appBar: AppBar(
        title: const Text(
          'Input Tagihan IPL',
          style: TextStyle(
            color: Colors.white,
            fontFamily: 'Roboto',
            fontWeight: FontWeight.bold,
          ),
        ),
        centerTitle: true,
        backgroundColor: Colors.indigo[800],
        elevation: 0.0,
        leading: IconButton(
          icon: Icon(
            MdiIcons.arrowLeft,
            color: Colors.white,
            ),
          iconSize: 40.0,
          alignment: Alignment.topLeft,
          onPressed: () {
            Navigator.pop(context);
          },
        ),
      ),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(20.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              Row(
                children: [
                  DropdownButton<String>(
                    hint: const Text("Pilih Blok"),
                    value: selectedBlok,
                    items: blokList.map((String value) {
                      return DropdownMenuItem<String>(
                        value: value,
                        child: Text(value),
                      );
                    }).toList(),
                    onChanged: (newValue) {
                      setState(() {
                        selectedBlok = newValue;
                        selectedNomorKavling = null;
                        nomorKavlingList = [];
                        print('Blok dipilih: $newValue');
                        fetchNomorKavlingList(newValue!);
                      });
                    },
                  ),
                  const SizedBox(height: 20),
                  DropdownButton<String>(
                    hint: const Text("Pilih Nomor Kavling"),
                    value: selectedNomorKavling,
                    items: nomorKavlingList.map((String value) {
                      return DropdownMenuItem<String>(
                        value: value,
                        child: Text(value),
                      );
                    }).toList(),
                    onChanged: (newValue) {
                      setState(() {
                        selectedNomorKavling = newValue;
                        // Memanggil _submitData jika kedua dropdown sudah terpilih
                        if (selectedBlok != null && selectedNomorKavling != null) {
                          print('nomor yang dipilih adalah: $selectedNomorKavling dan blok $selectedBlok');
                          _submitData();
                        }
                      });
                    },
                  ),
                ],              
              ),
              const SizedBox(height: 20),
              TextField(
                controller: namaController,
                enabled: false,
                decoration: InputDecoration(
                  labelText: "Nama",
                  border: OutlineInputBorder(),
                ),
              ),
              const SizedBox(height: 20),
              Container(
                width: double.infinity,
                padding: const EdgeInsets.all(20.0),
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(30.0),
                  color: Colors.grey[400],
                ),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Row(
                      children: [
                        Icon(MdiIcons.water),
                        const SizedBox(width: 10),
                        const Text(
                          "Meter Awal",
                          style: TextStyle(
                            fontWeight: FontWeight.bold,
                            fontSize: 20.0,
                          ),
                        ),
                      ],
                    ),
                    Text(
                      meterAwal,
                      style: const TextStyle(
                        fontSize: 18.0,
                      ),
                    ),
                    const SizedBox(height: 20.0),
                    Divider(color: Colors.black),
                    const SizedBox(height: 20.0),
                    Row(
                      children: [
                        Icon(MdiIcons.waterCheck),
                        const SizedBox(width: 10),
                        const Text(
                          "Meter Akhir",
                          style: TextStyle(
                            fontWeight: FontWeight.bold,
                            fontSize: 20.0,
                          ),
                        ),
                      ],
                    ),
                    // TextField(
                    //   controller: meterAkhirController,
                    //   keyboardType: TextInputType.number,
                    //   decoration: InputDecoration(
                    //     hintText: 'Masukkan Meter Akhir',
                    //   ),
                    // ),
                    const SizedBox(height: 20.0),
                    // Center(
                    //   child: _image == null
                    //       ? ElevatedButton.icon(
                    //           onPressed: _pickImage,
                    //           icon: Icon(MdiIcons.camera, color: Colors.black),
                    //           label: Text(
                    //             "Ambil Gambar",
                    //             style: TextStyle(color: Colors.black),
                    //           ),
                    //           style: ElevatedButton.styleFrom(
                    //             backgroundColor: HexColor('#FE8660'),
                    //           ),
                    //         )
                    //       : Column(
                    //           children: [
                    //             Container(
                    //               width: double.infinity,
                    //               height: 200, // Set the height as needed
                    //               decoration: BoxDecoration(
                    //                 borderRadius: BorderRadius.circular(15),
                    //                 border: Border.all(
                    //                   color: Colors.black,
                    //                   width: 2,
                    //                 ),
                    //               ),
                    //               child: ClipRRect(
                    //                 borderRadius: BorderRadius.circular(15),
                    //                 child: Image.file(
                    //                   _image!,
                    //                   fit: BoxFit.contain,
                    //                 ),
                    //               ),
                    //             ),
                    //             const SizedBox(height: 10),
                    //             ElevatedButton.icon(
                    //               onPressed: _pickImage,
                    //               icon: Icon(MdiIcons.refresh, color: Colors.black),
                    //               label: Text(
                    //                 "Ulang",
                    //                 style: TextStyle(color: Colors.black),
                    //               ),
                    //               style: ElevatedButton.styleFrom(
                    //                 backgroundColor: HexColor('#FE8660'),
                    //               ),
                    //             ),
                    //           ],
                    //         ),
                    // ),
                  ],
                ),
              ),
              // const SizedBox(height: 20.0),
              // ElevatedButton(
              //   onPressed: _submitData,
              //   style: ElevatedButton.styleFrom(
              //     backgroundColor: HexColor('#FE8660'),
              //     padding: EdgeInsets.symmetric(horizontal: 50, vertical: 20),
              //     textStyle: TextStyle(
              //       fontSize: 20,
              //       fontWeight: FontWeight.bold,
              //     ),
              //   ),
              //   child: Container(
              //     width: double.infinity,
              //     alignment: Alignment.center,
              //     child: Text("Input IPL", style: TextStyle(color: Colors.black)),
              //   ),
              // ),
            ],
          ),
        ),
      ),
    );
  }
}

// Utility class for hex color conversion
class HexColor extends Color {
  static int _getColorFromHex(String hexColor) {
    hexColor = hexColor.toUpperCase().replaceAll('#', '');
    if (hexColor.length == 6) {
      hexColor = 'FF' + hexColor;
    }
    return int.parse(hexColor, radix: 16);
  }

  HexColor(final String hexColor) : super(_getColorFromHex(hexColor));
}
