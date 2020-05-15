package com.example.uasabsensi

import android.content.Context
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.renderscript.RenderScript
import android.util.Log
import com.androidnetworking.AndroidNetworking
import com.androidnetworking.common.Priority
import com.androidnetworking.error.ANError
import com.androidnetworking.interfaces.JSONObjectRequestListener
import kotlinx.android.synthetic.main.activity_main.*
import org.json.JSONObject

class MainActivity : AppCompatActivity() {
    val context = this
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        signin.setOnClickListener() {
            val Intent = Intent(context, Daftar::class.java)
            startActivity(Intent)
            finish()
        }
        val sharedPreferences = getSharedPreferences("CEKLOGIN", Context.MODE_PRIVATE)
        val stat = sharedPreferences.getString("STATUS", "")

        if (stat == "1") {

            startActivity(Intent(this@MainActivity, JadwalKelas::class.java))
            finish()

        } else {

            btnLogin.setOnClickListener {

                var nim = editTextNim.text.toString()
                var password = editTextPassword.text.toString()


                postkerserver(nim, password)

            }
        }


    }

    fun postkerserver(data1: String, data2: String) {

        AndroidNetworking.post("http://192.168.43.99/coba/ceklogin.php")
            .addBodyParameter("nim", data1)
            .addBodyParameter("password", data2)
            .setPriority(Priority.MEDIUM)
            .build()
            .getAsJSONObject(object : JSONObjectRequestListener {
                override fun onResponse(response: JSONObject) {

                    val jsonArray = response.getJSONArray("result")
                    for (i in 0 until jsonArray.length()) {
                        val jsonObject = jsonArray.getJSONObject(i)
                        Log.e("_kotlinTitle", jsonObject.optString("status"))
                        var statuslogin = jsonObject.optString("status")
                        txt1.setText(statuslogin)


                        if (statuslogin == "1") {

                            val sharedPreferences = getSharedPreferences("CEKLOGIN", Context.MODE_PRIVATE)
                            val editor = sharedPreferences.edit()

                            editor.putString("STATUS", statuslogin)
                            editor.apply()

                            startActivity(Intent(this@MainActivity, JadwalKelas::class.java))
                            finish()
                        }
                    }


                }

                override fun onError(error: ANError) { // handle error
                }

            })

    }

}
