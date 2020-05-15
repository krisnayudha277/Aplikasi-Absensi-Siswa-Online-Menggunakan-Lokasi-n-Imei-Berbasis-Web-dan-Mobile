package com.example.uasabsensi

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

class JadwalAdapter (val kelasList: ArrayList<Kelas>):RecyclerView.Adapter<JadwalAdapter.ViewHolder>() {


    override fun onBindViewHolder(holder: ViewHolder, position: Int) {

        val kelas: Kelas = kelasList[position]
        holder?.textViewMataKuliah?.text = kelas.matakuliah
        holder?.textViewNamaDosen?.text = kelas.namadosen
        holder?.textViewHari?.text = kelas.hari
        holder?.textViewJam?.text = kelas.jam

    }


    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ViewHolder {
        val v = LayoutInflater.from(parent?.context).inflate(R.layout.list_layout, parent, false)
        return ViewHolder(v)

    }


    override fun getItemCount(): Int {

        return kelasList.size
    }


    class ViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {

        val textViewMataKuliah = itemView.findViewById(R.id.textViewMataKuliah) as TextView
        val textViewNamaDosen = itemView.findViewById(R.id.textViewNamaDosen) as TextView
        val textViewHari = itemView.findViewById(R.id.textViewHari) as TextView
        val textViewJam = itemView.findViewById(R.id.textViewJam) as TextView


    }
}