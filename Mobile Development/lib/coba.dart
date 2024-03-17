import 'package:flutter/material.dart';

void main() {
  runApp(MaterialApp(
    home: Dashboard1(),
  ));
}

class Dashboard1 extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
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

      body: Padding(
        padding: const EdgeInsets.fromLTRB(20.0, 20.0, 20.0, 0.0),
        child: Column(
          children: [
            Container(
              padding: EdgeInsets.fromLTRB(20.0, 15.0, 20.0, 0.0),
              width: MediaQuery.of(context).size.width,
              height: 300.0,
              decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(20),
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
            SizedBox(height: 20.0),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                Container(
                  width: MediaQuery.of(context).size.width / 2 - 30, // setengah dari lebar layar dikurangi margin
                  child: ElevatedButton(
                    onPressed: () {},
                    child: Text('Menu 1'),
                    style: ElevatedButton.styleFrom(
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(20.0),
                      ),
                    ),
                  ),
                ),
                Container(
                  width: MediaQuery.of(context).size.width / 2 - 30, // setengah dari lebar layar dikurangi margin
                  child: ElevatedButton(
                    onPressed: () {},
                    child: Text('Menu 2'),
                    style: ElevatedButton.styleFrom(
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(20.0),
                      ),
                    ),
                  ),
                ),
              ],
            ),
          ],
        ),
      ),
    );
  }
}
