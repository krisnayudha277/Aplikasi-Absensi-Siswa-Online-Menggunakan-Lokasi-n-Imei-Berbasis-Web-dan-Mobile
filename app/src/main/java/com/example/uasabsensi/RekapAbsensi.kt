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

class RekapAbsensi : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_rekap_absensi)
//        val nomor = getSharedPreferences("NOMOR", Context.MODE_PRIVATE)
//        val ndata = nomor.getString("imei", "").toString()
//        Log.d("NOMOR", ndata)
//        getRiwayat(ndata)
//    }
//    fun getRiwayat(data: String){
        val recyclerView = findViewById(R.id.recyclerview2) as RecyclerView
        recyclerView.layoutManager= LinearLayoutManager(this, LinearLayout.VERTICAL, false)

        val users=ArrayList<Rekap>()


        AndroidNetworking.get("http://192.168.43.210/coba/get_abensi.php")
//            .addBodyParameter("imei",data)
            .setPriority(Priority.MEDIUM)
            .build()
            .getAsJSONObject(object : JSONObjectRequestListener {
                override fun onResponse(response: JSONObject) {
                    Log.e("_kotlinResponse", response.toString())

                    val jsonArray = response.getJSONArray("result")
                    for (i in 0 until jsonArray.length()) {
                        val jsonObject = jsonArray.getJSONObject(i)
                        Log.e("_kotlinTitle", jsonObject.optString("nama"))

                        // txt1.setText(jsonObject.optString("shubuh"))
                        var isi1=jsonObject.optString("nama").toString()
                        var isi2=jsonObject.optString("absensi").toString()

                        users.add(Rekap("$isi1", "$isi2"))


                    }
//                    val adapter=RekapAdapter(users, {users -> onclick(users)})
                    val adapter=RekapAdapter(users)
                    recyclerView.adapter=adapter
                }

                override fun onError(anError: ANError) {
                    Log.i("_err", anError.toString())
                }
            })
    }
//    private fun onclick(classModelRiwayat: ClassModelRiwayat){
//        val intent = Intent(applicationContext, DetailActivity::class.java)
//        intent.putExtra("id_pinjam", classModelRiwayat.id)
//        startActivity(intent)
//    }
}
