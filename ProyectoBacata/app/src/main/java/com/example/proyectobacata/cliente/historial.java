package com.example.proyectobacata.cliente;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.proyectobacata.R;

import java.util.ArrayList;
import com.example.proyectobacata.cliente.objHistorial;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class historial extends AppCompatActivity implements View.OnClickListener{


    private TextView historial;
    private ArrayList<objHistorial> history = new ArrayList<objHistorial>();

    String Id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_historial);
        Id = getIntent().getStringExtra("Id");
        historial = (TextView)findViewById(R.id.txtHistorial);
        TraerHistorial("http://192.168.0.6/aplicaciones/Componentes-Proyecto/Presentacion/consultarHistorial.php?", historial);
    }

    @Override
    public void onClick(View view) {

    }

    public void TraerHistorial(String URL, TextView historial){
        history.clear();
        String url = URL +"id="+ Integer.parseInt(Id);
        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            objHistorial obj = new objHistorial();
                            JSONObject jsonObject = new JSONObject(response);
                            JSONArray jsonArray = jsonObject.getJSONArray("Historial");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject jsonObject1 = jsonObject1 = jsonArray.getJSONObject(i);
//                                Toast.makeText(getApplicationContext(), ""+jsonObject1, Toast.LENGTH_LONG).show();

                                obj.id_reserva = Integer.parseInt(jsonObject1.getString("id_reserva"));
                                obj.fecha_reserva = jsonObject1.getString("fecha_reserva");
                                obj.fechaInicio_reserva = jsonObject1.getString("fechaInicio_reserva");
                                obj.fechaFinal_reserva = jsonObject1.getString("fechaFinal_reserva");
                                obj.Vhabitaciones_reserva = Integer.parseInt(jsonObject1.getString("Vhabitaciones_reserva"));
                                obj.Vservicios_reserva = Integer.parseInt(jsonObject1.getString("Vservicios_reserva"));
                                obj.id_usuario = Integer.parseInt(jsonObject1.getString("id_usuario"));
                                obj.id_hotel = Integer.parseInt(jsonObject1.getString("id_hotel"));

                                history.add(obj);
                            }

                            generarTextoString(history, historial);

                        } catch (JSONException e) {
                            Toast.makeText(getApplicationContext(), ""+e, Toast.LENGTH_LONG).show();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        }
        );
        requestQueue.add(stringRequest);
    }

    public void generarTextoString(ArrayList<objHistorial> history, TextView historial){
        String histo = "";
        for(int i = 0; i < history.size(); i++){
            histo +=    "Id Reserva: "+  history.get(i).id_reserva + "\n"+
                        "Fecha de Reservacion: "+  history.get(i).fecha_reserva + "\n"+
                        "Fecha de Inicio: "+  history.get(i).fechaInicio_reserva + "\n"+
                        "Fecha Finalizacion: "+  history.get(i).fechaFinal_reserva + "\n"+
                        "Valor Habitaciones: "+  history.get(i).Vhabitaciones_reserva + "\n"+
                        "Valor Servicios: "+  history.get(i).Vservicios_reserva + "\n"+
                        "-------------------------"+"\n";
        }
        historial.setText(histo);
    }
}