import 'package:flutter/material.dart';
import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';
import 'package:pro_tav1/tagihan_ipl_warga.dart';
import 'other_menu.dart';

void main() {
  runApp(MaterialApp(
    home: Dashboard1(),
  ));
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

class Dashboard1 extends StatefulWidget {
  @override
  _Dashboard1State createState() => _Dashboard1State();
}

class _Dashboard1State extends State<Dashboard1> {
  int _selectedIndex = 0;
  final GlobalKey<NavigatorState> _navigatorKey = GlobalKey<NavigatorState>();

  void _onItemTapped(int index) {
    setState(() {
      _selectedIndex = index;
    });

    if (index == 1) {
      _navigatorKey.currentState!.push(MaterialPageRoute(builder: (context) => OtherMenu()));
    } else if (index == 0) {
      _navigatorKey.currentState!.popUntil((route) => route.isFirst);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: HexColor('#F4EBE8'),
      appBar: AppBar(
        title: const Text(
          'BCV 1',
          style: TextStyle(
            color: Colors.white,
            fontWeight: FontWeight.bold,
          ),
        ),
        centerTitle: true,
        backgroundColor: Colors.indigo[800],
        elevation: 0.0,
      ),

      body: Navigator(
        key: _navigatorKey,
        onGenerateRoute: (settings) {
          return MaterialPageRoute(
            builder: (context) => MainContent(),
          );
        },
      ),

      bottomNavigationBar: BottomNavigationBar(
        items: const <BottomNavigationBarItem>[
          BottomNavigationBarItem(
              icon: ImageIcon(AssetImage('assets/home-icon.png')),
              label: 'Home'
          ),
          BottomNavigationBarItem(
              icon: ImageIcon(AssetImage('assets/threedots-icon.png')),
              label: 'Other'
          ),
        ],
        currentIndex: _selectedIndex,
        selectedItemColor: Colors.indigo[800],
        unselectedItemColor: Colors.grey,
        onTap: _onItemTapped,
      ),
    );
  }
}

class MainContent extends StatefulWidget {
  @override
  State<MainContent> createState() => _MainContentState();
}

class _MainContentState extends State<MainContent> {
  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.fromLTRB(20.0, 20.0, 20.0, 20.0),
      child: Column(
        children: [
          Container(
            padding: const EdgeInsets.fromLTRB(20.0, 15.0, 20.0, 20.0),
            height: 300.0,
            decoration: BoxDecoration(
              borderRadius: BorderRadius.circular(30.0),
              color: Colors.indigo[800],
            ),
            child: const Stack(
              children: [
                Positioned(
                  top: 0.0,
                  right: 10.0,
                  child: CircleAvatar(
                    radius: 40.0,
                    backgroundColor: Colors.white,
                  ),
                ),
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      'Hi!',
                      style: TextStyle(
                        color: Colors.white,
                        fontWeight: FontWeight.bold,
                        fontFamily: 'Roboto',
                        fontSize: 20.0,
                      ),
                    ),
                    SizedBox(height: 5.0,),
                    Text(
                      'Yono Butar',
                      style: TextStyle(
                        color: Colors.white,
                        fontWeight: FontWeight.bold,
                        fontFamily: 'Roboto',
                        fontSize: 30.0,
                      ),
                    ),
                    Divider(
                      color: Colors.white,
                      thickness: 2.0,
                      height: 30.0,
                    ),
                    SizedBox(height: 5.0,),
                    Text(
                      'Warga',
                      style: TextStyle(
                        color: Colors.white,
                        fontFamily: 'Roboto',
                        fontSize: 20.0,
                      ),
                    ),
                    Divider(
                      color: Colors.white,
                      thickness: 2.0,
                      height: 50.0,
                    ),
                    Text(
                      'Tagihan IPL bulan ini: \n Rp.300.000,00',
                      style: TextStyle(
                        color: Colors.white,
                        fontFamily: 'Roboto',
                        fontSize: 20.0,
                      ),
                    ),
                  ],
                ),
              ],
            ),
          ),
          const SizedBox(height: 20.0),
          Row(
            children: [
              Expanded(
                child: Container(
                  padding: const EdgeInsets.fromLTRB(24.0, 5.0, 10.0, 5.0),
                  decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(30.0),
                    color: Colors.indigo[800],
                  ),
                  child: Row(
                    children: [
                      Icon(
                        MdiIcons.trashCan,
                        color: HexColor('#FFFFFF'),
                        size: 44.0,
                      ),
                      const SizedBox(width: 8.0),
                      const Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'Jadwal ambil sampah:',
                            textAlign: TextAlign.start,
                            style: TextStyle(
                              color: Colors.white,
                              fontFamily: 'Roboto',
                              fontWeight: FontWeight.bold,
                              fontSize: 20.0,
                            ),
                          ),
                          Text(
                            'Hari Selasa dan Kamis',
                            style: TextStyle(
                              color: Colors.white,
                              fontFamily: 'Roboto',
                              fontSize: 22.0,
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
              ),
            ],
          ),
          SizedBox(height: 20.0,),
          Row(
            children: [
              Expanded(
                child: ElevatedButton(
                  onPressed: () {
                        Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => const DetailIPL()));
                      },
                  style: ElevatedButton.styleFrom(
                      backgroundColor: HexColor("#FE8660"),
                      fixedSize: const Size(0.0, 65.0),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(30.0),
                      )
                  ),
                  child: Row(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Center(
                        child: Icon(
                          MdiIcons.receiptTextEdit,
                          color: HexColor('#253793'),
                          size: 44.0,
                        ),
                      ),
                      const SizedBox(width: 8.0),
                      const Center(
                        child: Text(
                          'Detail Tagihan IPL',
                          textAlign: TextAlign.center,
                          style: TextStyle(
                            color: Colors.black,
                            fontFamily: 'Roboto',
                            fontSize: 20.0,
                          ),
                        ),
                      ),
                    ],
                  ),
                ),
              ),
            ],
          ),
        ],
      ),
    );
  }
}
