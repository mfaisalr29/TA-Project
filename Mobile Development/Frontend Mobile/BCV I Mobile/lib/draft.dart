import 'package:flutter/material.dart';
import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';
import 'main_warga.dart';

void main() {
  runApp(const MaterialApp(
    home: StatusAlat(),
  ));
}

class StatusAlat extends StatefulWidget {
  const StatusAlat({super.key});

  @override
  _StatusAlatState createState() => _StatusAlatState();
}

class _StatusAlatState extends State<StatusAlat> {
  // int _selectedIndex = 0;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Padding(
        padding: const EdgeInsets.all(20.0),
        child: Row(
          children: [
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
