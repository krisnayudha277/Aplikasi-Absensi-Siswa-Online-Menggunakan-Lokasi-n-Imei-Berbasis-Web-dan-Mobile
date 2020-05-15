package com.example.uasabsensi

import android.Manifest
import android.content.Context
import android.content.Intent
import android.content.pm.PackageManager
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.telephony.TelephonyManager
import android.view.View
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.core.app.ActivityCompat
import com.androidnetworking.AndroidNetworking
import com.androidnetworking.common.Priority
import com.androidnetworking.error.ANError
import com.androidnetworking.interfaces.JSONArrayRequestListener
import kotlinx.android.synthetic.main.activity_daftar.*
import org.json.JSONArray


class Daftar : AppCompatActivity() {
    val context = this
    internal lateinit var button: Button
    internal lateinit var imei: TextView
    internal lateinit var IMEINumber: String
    private val REQUEST_CODE = 101
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_daftar)

        insert.setOnClickListener() {
            var nim = nim.text.toString()
            var name = name.text.toString()
            var address = address.text.toString()
            var imei = imei.text.toString()
            var email = email.text.toString()
            var jurusan = jurusan.text.toString()
            var fakultas = fakultas.text.toString()
            var password = password.text.toString()
            postkeserver(nim, name,address, imei,email,jurusan,fakultas,password)

            val intent = Intent(context, MainActivity::class.java)
            startActivity(intent)
        }
            imei = findViewById<TextView>(R.id.imei)
            button = findViewById<Button>(R.id.button)
            button.setOnClickListener(View.OnClickListener {
                val telephonyManager = getSystemService(Context.TELEPHONY_SERVICE) as TelephonyManager
                if (ActivityCompat.checkSelfPermission(
                        this@Daftar,
                        Manifest.permission.READ_PHONE_STATE
                    ) != PackageManager.PERMISSION_GRANTED
                ) {
                    ActivityCompat.requestPermissions(
                        this@Daftar,
                        arrayOf(Manifest.permission.READ_PHONE_STATE),
                        REQUEST_CODE
                    )
                    return@OnClickListener
                }
                IMEINumber = telephonyManager.deviceId
                imei.setText(IMEINumber)
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
    fun postkeserver(data1: String, data2: String, data3: String, data4: String, data5: String, data6: String, data7: String, data8: String) {
        AndroidNetworking.post("http://192.168.43.99/coba/createmhs.php")

            .addBodyParameter("nim", data1)
            .addBodyParameter("name", data2)
            .addBodyParameter("address", data3)
            .addBodyParameter("imei", data4)
            .addBodyParameter("email", data5)
            .addBodyParameter("jurusan", data6)
            .addBodyParameter("fakultas", data7)
            .addBodyParameter("password", data8)
            .setPriority(Priority.MEDIUM)
            .build()
            .getAsJSONArray(object : JSONArrayRequestListener {
                override fun onResponse(response: JSONArray?) {

                }

                override fun onError(anError: ANError?) {

                }
            })

    }
}
