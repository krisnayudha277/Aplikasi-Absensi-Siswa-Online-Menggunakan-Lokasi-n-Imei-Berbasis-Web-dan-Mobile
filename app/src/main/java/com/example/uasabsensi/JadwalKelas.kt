package com.example.uasabsensi


import android.content.Context
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.LinearLayout
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.androidnetworking.AndroidNetworking
import com.androidnetworking.common.Priority
import com.androidnetworking.error.ANError
import com.androidnetworking.interfaces.JSONObjectRequestListener
import kotlinx.android.synthetic.main.activity_jadwal_kelas.*
import org.json.JSONObject

class JadwalKelas : AppCompatActivity() {
    val context = this
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_jadwal_kelas)

        keluar.setOnClickListener {
            val sharedPreferences = getSharedPreferences("CEKLOGIN", Context.MODE_PRIVATE)
            val editor = sharedPreferences.edit()

            editor.putString("STATUS", "0")
            editor.apply()

            startActivity(Intent(this@JadwalKelas, MainActivity::class.java))
            finish()
        }
        absensi.setOnClickListener() {
            val Intent = Intent(context, Absensi::class.java)
            startActivity(Intent)
            finish()
        }
        rekap.setOnClickListener() {
            val Intent = Intent(context, RekapAbsensi::class.java)
            startActivity(Intent)
            finish()
        }
        val recyclerView = findViewById(R.id.recyclerview) as RecyclerView
        recyclerView.layoutManager= LinearLayoutManager(this, LinearLayout.VERTICAL, false)

        val users=ArrayList<Kelas>()


        AndroidNetworking.get("http://192.168.43.99/coba/show_jadwal.php")
            .setPriority(Priority.MEDIUM)
            .build()
            .getAsJSONObject(object : JSONObjectRequestListener {
                override fun onResponse(response: JSONObject) {
                    Log.e("_kotlinResponse", response.toString())

                    val jsonArray = response.getJSONArray("result")
                    for (i in 0 until jsonArray.length()) {
                        val jsonObject = jsonArray.getJSONObject(i)
                        Log.e("_kotlinTitle", jsonObject.optString("dosen"))

                        // txt1.setText(jsonObject.optString("shubuh"))
                        var isi1=jsonObject.optString("mata_kuliah").toString()
                        var isi2=jsonObject.optString("dosen").toString()
                        var isi3=jsonObject.optString("hari").toString()
                        var isi4=jsonObject.optString("jam").toString()

                        users.add(Kelas("$isi1", "$isi2", "$isi3", "$isi4"))


                    }

                    val adapter=JadwalAdapter(users)
                    recyclerView.adapter=adapter
                }

                override fun onError(anError: ANError) {
                    Log.i("_err", anError.toString())
                }
            })
    }
}
