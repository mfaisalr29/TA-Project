import 'dart:async';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';
import 'package:pro_tav1/login_page.dart';
import 'package:pro_tav1/main.dart';

class SplashScreen extends StatefulWidget {
  const SplashScreen({super.key});

  @override
  State<SplashScreen> createState() => _SplashScreenState();
}

class _SplashScreenState extends State<SplashScreen>
    with SingleTickerProviderStateMixin {
  late AnimationController _controller;
  late Animation<Color?> _glowAnimation;

  @override
  void initState() {
    super.initState();
    SystemChrome.setEnabledSystemUIMode(SystemUiMode.immersive);

    _controller = AnimationController(
      duration: const Duration(milliseconds: 1000),
      vsync: this,
    );

    _glowAnimation = ColorTween(
      begin: Colors.transparent,
      end: Colors.white,
    ).animate(_controller);

    _controller.repeat(reverse: true);
    
    Future.delayed(const Duration(seconds: 2), () {
      Navigator.of(context).pushReplacement(MaterialPageRoute(
        builder: (_) => const LoginPage(),
      ));
    });
  }

  @override
  void dispose() {
    _controller.dispose();
    SystemChrome.setEnabledSystemUIMode(SystemUiMode.manual,
        overlays: SystemUiOverlay.values);
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        decoration: BoxDecoration(
          gradient: LinearGradient(
            colors: [HexColor("#253793"), HexColor("#F4D772")],
            begin: Alignment.topLeft,
            end: Alignment.bottomRight,
            stops: const [0.6, 1.0],
          ),
        ),
        child: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              AnimatedBuilder(
                animation: _glowAnimation,
                builder: (context, child) {
                  return Icon(
                    MdiIcons.homeCity,
                    color: _glowAnimation.value,
                    size: 100.0,
                  );
                },
              ),
              const SizedBox(height: 10.0),
              AnimatedBuilder(
                animation: _glowAnimation,
                builder: (context, child) {
                  return Text(
                    'Bandung City View I\nMobile',
                    textAlign: TextAlign.center,
                    style: TextStyle(
                      color: _glowAnimation.value,
                      fontFamily: 'BebasNeue',
                      fontSize: 45.0,
                      fontStyle: FontStyle.italic,
                    ),
                  );
                },
              ),
            ],
          ),
        ),
      ),
    );
  }
}
