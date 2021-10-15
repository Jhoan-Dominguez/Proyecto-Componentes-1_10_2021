package com.example.proyectobacata.cliente;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.proyectobacata.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Date;
import java.util.List;

public class hacerReserva extends AppCompatActivity {
    private ArrayList<habitacion> habitaciones = new ArrayList<habitacion>();
    private ArrayList<servicio> servicios = new ArrayList<servicio>();

    private Spinner spinnerServicios;
    private Spinner spinnerHabitacion;
    private EditText txtCantidadHabitaciones;
    private EditText fechaInicio;
    private EditText fechaFin;
    private RadioButton boolHuesped;
    private EditText nombreHuesped;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hacer_reserva);

        spinnerServicios = (Spinner)findViewById(R.id.spinnerServicios);
        spinnerHabitacion = (Spinner)findViewById(R.id.spinnerHabitacion);
        txtCantidadHabitaciones = (EditText)findViewById(R.id.txtCantidadHabitaciones);
        nombreHuesped = (EditText)findViewById(R.id.nombreHuesped);
        boolHuesped = (RadioButton)findViewById(R.id.boolHuesped);
        fechaInicio = (EditText)findViewById(R.id.fechaInicio);
        fechaFin = (EditText)findViewById(R.id.fechaFin);

        String URL = "http://192.168.0.6/aplicaciones/Componentes-Proyecto/Presentacion/obtenerHabitaciones.php";
        obtenerHabitaciones(URL, spinnerHabitacion);
//        URL = "";
//        obtenerServicios(URL, spinnerServicios)
    }

    public void obtenerHabitaciones(String URL, Spinner spinnerHabitacion){
        habitaciones.clear();
        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {

                            JSONObject jsonObject = new JSONObject(response);
                            JSONArray jsonArray = jsonObject.getJSONArray("Habitacion");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                habitacion obj = new habitacion();
                                JSONObject jsonObject1 = jsonObject1 = jsonArray.getJSONObject(i);
//                                Toast.makeText(getApplicationContext(), ""+jsonObject1, Toast.LENGTH_LONG).show();

                                obj.id_habitacion = Integer.parseInt(jsonObject1.getString("id_habitacion"));
                                obj.camas_habitacion = Integer.parseInt(jsonObject1.getString("camas_habitacion"));
                                obj.bath_habitacion = Integer.parseInt(jsonObject1.getString("bath_habitacion"));
                                obj.estado_habitacion = Integer.parseInt(jsonObject1.getString("estado_habitacion"));
                                obj.precio_habitacion = Integer.parseInt(jsonObject1.getString("precio_habitacion"));
                                obj.id_tipoHabitacion = Integer.parseInt(jsonObject1.getString("id_tipoHabitacion"));

                                habitaciones.add(obj);
                            }


                            String[] aux = new String[habitaciones.size()];
                            for(int i=0; i<habitaciones.size(); i++){
                                aux[i] = ""+habitaciones.get(i).id_habitacion;
                            }


                            spinnerHabitacion.setAdapter(
                                    new ArrayAdapter<String>(getApplicationContext(),
                                    android.R.layout.simple_spinner_dropdown_item,aux));



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
}