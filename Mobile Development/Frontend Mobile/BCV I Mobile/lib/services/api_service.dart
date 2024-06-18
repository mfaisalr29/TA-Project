import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

class ApiService {
  static const String _url = 'http://34.101.66.3:8000/api';

  Future<Map<String, dynamic>> login(String email, String password) async {
    const String url = '$_url/auth/login';
    final response = await http.post(
      Uri.parse(url),
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: {
        'email': email,
        'password': password,
      },
    );

    if (response.statusCode == 200) {
      final responseBody = json.decode(response.body);
      return responseBody;
    } else {
      throw Exception('Failed to login');
    }
  }

  Future<void> saveToken(String token) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString('access_token', token);
  }

  Future<int> getBills() async {
    final SharedPreferences prefs = await SharedPreferences.getInstance();
    final token = prefs.getString('token');
    
    if (token == null) {
      throw Exception('Token tidak tersedia');
    }

    const String url = '$_url/warga/bills';
    final response = await http.post(
      Uri.parse(url),
      headers: {
        'Authorization': 'Bearer $token',
      },
    );

    if (response.statusCode == 200) {
      final responseBody = json.decode(response.body);
      return responseBody[0]['total_tag'].toInt();
    } else {
      throw Exception('Failed to send request');
    }
  }

  Future<String> getNameBills() async {
    final SharedPreferences prefs = await SharedPreferences.getInstance();
    final token = prefs.getString('token');
    
    if (token == null) {
      throw Exception('Token tidak tersedia');
    }

    const String url = '$_url/warga/user/profile';
    final response = await http.post(
      Uri.parse(url),
      headers: {
        'Authorization': 'Bearer $token',
      },
    );

    if (response.statusCode == 200) {
      final responseBody = json.decode(response.body);
      return responseBody['nama'].toString();
    } else {
      throw Exception('Failed to send request');
    }
  }


  Future<List<dynamic>> getSchedule() async {
    final SharedPreferences prefs = await SharedPreferences.getInstance();
    final token = prefs.getString('token');

    final String url = '$_url/warga/schedule';
    final response = await http.get(
      Uri.parse(url),
      headers: {
        'Authorization': 'Bearer $token',
      },
    );

    if (response.statusCode == 200) {
      return json.decode(response.body) as List<dynamic>;
    } else {
      throw Exception('Failed to send request');   
    }
  }

// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------

  Future<List<String>> fetchResidents() async {
    const String url = '$_url/residents';
    final response = await http.get(Uri.parse(url));

    if (response.statusCode == 200) {
      final data = json.decode(response.body);
      return List<String>.from(data.map((resident) => resident['name'].toString()));
    } else {
      throw Exception('Failed to load residents');
    }
  }

  Future<Map<String, dynamic>> fetchResidentDetails(String residentName) async {
    final String url = '$_url/resident?name=$residentName';
    final response = await http.get(Uri.parse(url));

    if (response.statusCode == 200) {
      return json.decode(response.body);
    } else {
      throw Exception('Failed to load resident details');
    }
  }

}