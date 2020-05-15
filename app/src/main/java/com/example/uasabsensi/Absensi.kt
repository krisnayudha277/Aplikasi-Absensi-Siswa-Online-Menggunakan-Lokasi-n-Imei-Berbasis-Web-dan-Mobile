package com.example.uasabsensi


import android.Manifest
import android.content.Context
import android.content.Intent
import android.content.pm.PackageManager
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.telephony.TelephonyManager
import android.util.Log
import android.view.View
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.core.app.ActivityCompat
import com.androidnetworking.AndroidNetworking
import com.androidnetworking.common.Priority
import com.androidnetworking.error.ANError
import com.androidnetworking.interfaces.JSONArrayRequestListener
import kotlinx.android.synthetic.main.activity_absensi.*
import kotlinx.android.synthetic.main.activity_daftar.*
import kotlinx.android.synthetic.main.activity_daftar.jurusan
import kotlinx.android.synthetic.main.activity_daftar.nim
import org.json.JSONArray

class Absensi : AppCompatActivity() {
    val context = this
    internal lateinit var button2: Button
    internal lateinit var imei2: TextView
    internal lateinit var IMEINumber2: String
    private val REQUEST_CODE = 101
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_absensi)

        val nomor = getSharedPreferences("NOMOR", Context.MODE_PRIVATE)
        val ndata = nomor.getString("imei","").toString()
        Log.d("NOMOR", ndata)

        absen.setOnClickListener() {
            var matakuliah = matakuliah.text.toString()
            var nama = nama.text.toString()
            var nim = nim.text.toString()
            var absensi = absensi.text.toString()
            var imei2 = imei2.text.toString()

            postkeserver2(matakuliah,nama, nim,absensi, imei2)

            val intent = Intent(context, JadwalKelas::class.java)
            startActivity(intent)
        }
        imei2 = findViewById<TextView>(R.id.imei2)
        button2 = findViewById<Button>(R.id.button2)
        button2.setOnClickListener(View.OnClickListener {
            val telephonyManager = getSystemService(Context.TELEPHONY_SERVICE) as TelephonyManager
            if (ActivityCompat.checkSelfPermission(
                    this@Absensi,
                    Manifest.permission.READ_PHONE_STATE
                ) != PackageManager.PERMISSION_GRANTED
            ) {
                ActivityCompat.requestPermissions(
                    this@Absensi,
                    arrayOf(Manifest.permission.READ_PHONE_STATE),
                    REQUEST_CODE
                )
                return@OnClickListener
            }
            IMEINumber2 = telephonyManager.deviceId
            imei2.setText(IMEINumber2)
        })
    }
    override fun onRequestPermissionsResult(requestCode: Int, permissions: Array<String>, grantResults: IntArray) {
        when (requestCode) {
            REQUEST_CODE -> {
                if (grantResults.size > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    Toast.makeText(this, "Permission granted.", Toast.LENGTH_SHORT).show()
                } else {
                    Toast.makeText(this, "Permission denied.", Toast.LENGTH_SHORT).show()
                }
            }
        }
    }
}

fun postkeserver2(
    data1: String,
    data2: String,
    data3: String,
    data4: String,
    data5: String
) {
    AndroidNetworking.post("http://192.168.43.99/coba/insert_absensi.php")
        .addBodyParameter("mata_kuliah", data1)
        .addBodyParameter("nama", data2)
        .addBodyParameter("nim", data3)
        .addBodyParameter("absensi", data4)
        .addBodyParameter("imei", data5)
        .setPriority(Priority.MEDIUM)
        .build()
        .getAsJSONArray(object : JSONArrayRequestListener {
            override fun onResponse(response: JSONArray?) {

            }

            override fun onError(anError: ANError?) {

            }
        })
}