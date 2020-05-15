package com.example.uasabsensi

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

 class RekapAdapter (val RekapList: ArrayList<Rekap>): RecyclerView.Adapter<RekapAdapter.ViewHolder>() {
     override fun onBindViewHolder(holder: RekapAdapter.ViewHolder, position: Int) {

         val kelas: Rekap = RekapList[position]
         holder?.textViewNama?.text = kelas.nama
         holder?.textViewAbsensi?.text = kelas.absensi
//         , val clickListener: (Rekap) -> Unit
//         holder.bind(kelas, clickListener)
     }


     override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ViewHolder {
        val v = LayoutInflater.from(parent?.context).inflate(R.layout.list_layout2, parent, false)
        return ViewHolder(v)

    }


    override fun getItemCount(): Int {

        return RekapList.size
    }


    class ViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {

        val textViewNama = itemView.findViewById(R.id.textViewNama) as TextView
        val textViewAbsensi = itemView.findViewById(R.id.textViewAbsensi) as TextView

//        fun bind(classModelRiwayat: Rekap, clickListener: (Rekap) -> Unit) {
//            itemView.setOnClickListener {
//                clickListener(classModelRiwayat)
//            }
//        }
    }
 }