import 'package:flutter/material.dart';
import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';
import 'main_warga.dart';

void main() {
  runApp(const MaterialApp(
    home: OtherMenuAdmin(),
  ));
}

class OtherMenuAdmin extends StatefulWidget {
  const OtherMenuAdmin({super.key});

  @override
  _OtherMenuAdminState createState() => _OtherMenuAdminState();
}

class _OtherMenuAdminState extends State<OtherMenuAdmin> {
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
                    TextButton.icon(
                      onPressed: () {},
                      icon: Icon(
                        MdiIcons.logoutVariant,
                        color: HexColor('#253793'),
                        size: 50.0,
                      ),
                      label: const Text(
                        'Log Out',
                        style: TextStyle(
                          color: Colors.black,
                          fontFamily: 'Roboto',
                          fontSize: 20.0,
                          fontWeight: FontWeight.bold,
                        ),
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
