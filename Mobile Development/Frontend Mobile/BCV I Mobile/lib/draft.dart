import 'package:flutter/material.dart';
import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';
import 'package:pro_tav1/main.dart';

void main() {
  runApp(const MaterialApp(
    home: DetailIPL(),
  ));
}

class DetailIPL extends StatefulWidget {
  const DetailIPL({super.key});

  @override
  _DetailIPLstate createState() => _DetailIPLstate();
}

class _DetailIPLstate extends State<DetailIPL> {
  String? selectedYear;
  String? selectedMonth;
  
  // Generate years dynamically from current year to 10 years in the future
  final List<String> years = List.generate(100, (index) => (DateTime.now().year + index).toString());
  
  final List<String> months = [
    'January', 'February', 'March', 'April', 'May', 'June', 
    'July', 'August', 'September', 'October', 'November', 'December'
  ];

  final TextEditingController _meterAwalController = TextEditingController();
  final TextEditingController _meterAkhirController = TextEditingController();
  final TextEditingController _totalTagihanController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor('#F4EBE8'),
      appBar: AppBar(
        title: const Text(
          'Detail Tagihan IPL',
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
            DropdownButton<String>(
              hint: const Text("Select Year"),
              value: selectedYear,
              items: years.map((String value) {
                return DropdownMenuItem<String>(
                  value: value,
                  child: Text(value),
                );
              }).toList(),
              onChanged: (newValue) {
                setState(() {
                  selectedYear = newValue;
                });
              },
            ),
            const SizedBox(height: 20),
            DropdownButton<String>(
              hint: const Text("Select Month"),
              value: selectedMonth,
              items: months.map((String value) {
                return DropdownMenuItem<String>(
                  value: value,
                  child: Text(value),
                );
              }).toList(),
              onChanged: (newValue) {
                setState(() {
                  selectedMonth = newValue;
                });
              },
            ),
            const SizedBox(height: 20),
            Expanded(
              child: Container(
                padding: const EdgeInsets.all(20.0),
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(30.0),
                  color: Colors.grey[400],
                ),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Text(
                      "Meter Awal",
                      style: TextStyle(
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                    TextField(
                      controller: _meterAwalController,
                      keyboardType: TextInputType.number,
                      decoration: const InputDecoration(
                        hintText: "Masukkan Meter Awal",
                      ),
                    ),
                    const SizedBox(height: 20.0),
                    const Text(
                      "Meter Akhir",
                      style: TextStyle(
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                    TextField(
                      controller: _meterAkhirController,
                      keyboardType: TextInputType.number,
                      decoration: const InputDecoration(
                        hintText: "Masukkan Meter Akhir",
                      ),
                    ),
                    const SizedBox(height: 20.0),
                    const Text(
                      "Total Tagihan IPL",
                      style: TextStyle(
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                    TextField(
                      controller: _totalTagihanController,
                      keyboardType: TextInputType.number,
                      decoration: const InputDecoration(
                        hintText: "Masukkan Total Tagihan",
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}