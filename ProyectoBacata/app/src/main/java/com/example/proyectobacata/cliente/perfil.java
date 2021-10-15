package com.example.proyectobacata.cliente;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextPaint;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.proyectobacata.MainActivity;
import com.example.proyectobacata.R;
import com.example.proyectobacata.administrador.viewPrincipalAdmin;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.Hashtable;
import java.util.Map;

public class perfil extends AppCompatActivity {

    EditText TxtCambiarNombre, TxtCambiarDireccion, TxtCambiarTelefono, TxtCambiarCorreo, TxtCambiarPassword, TxtId;
    String id_usuario, nombre, direccion, telefono, correo, password;
    String Id;
    Button btnActualizarDatos;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_perfil);
        TxtId = (EditText)findViewById(R.id.TxtId);
        Id = getIntent().getStringExtra("Id");
        TxtId.setText(Id);
        TxtCambiarNombre = (EditText) findViewById(R.id.TxtCambiarNombre);
        TxtCambiarDireccion = (EditText) findViewById(R.id.TxtCambiarDireccion);
        TxtCambiarTelefono = (EditText) findViewById(R.id.TxtCambiarTelefono);
        TxtCambiarCorreo = (EditText) findViewById(R.id.TxtCambiarCorreo);
        TxtCambiarPassword = (EditText) findViewById(R.id.TxtCambiarPassword);

        btnActualizarDatos = (Button) findViewById(R.id.btnActualizarDatos);

        TraerInfo("http://192.168.0.6/aplicaciones/Componentes-Proyecto/Presentacion/obtenerPerfil.php?");

        btnActualizarDatos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                id_usuario = TxtId.getText().toString();
                nombre = TxtCambiarNombre.getText().toString();
                direccion = TxtCambiarDireccion.getText().toString();
                telefono = TxtCambiarTelefono.getText().toString();
                correo = TxtCambiarCorreo.getText().toString();
                password = TxtCambiarPassword.getText().toString();

                if (!id_usuario.isEmpty() && !nombre.isEmpty() && !direccion.isEmpty() && !telefono.isEmpty() && !correo.isEmpty() && !password.isEmpty()) {
                    actualizarPerfil("http://192.168.0.6/aplicaciones/Componentes-Proyecto/Presentacion/actualizarPerfil.php");
                } else {
                    Toast.makeText(perfil.this, "no se permiten campos vacios", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    public void actualizarPerfil(String URL){
        StringRequest stringRequest;
        stringRequest = new StringRequest(Request.Method.POST, URL,
                new Response.Listener<String>() {

                    @Override
                    public void onResponse(String response) {
                        // En este apartado se programa lo que deseamos hacer en caso de no haber errores

                            if(response.equals("Successful Update")){
                                Toast.makeText(perfil.this, "Successful Update", Toast.LENGTH_LONG).show();
                            }else{
                                Toast.makeText(perfil.this, "Error"+response, Toast.LENGTH_LONG).show();
                            }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                // En caso de tener algun error en la obtencion de los datos
                Toast.makeText(perfil.this, ""+error, Toast.LENGTH_LONG).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {

                // En este metodo se hace el envio de valores de la aplicacion al servidor
                Map<String, String> parametros = new Hashtable<String, String>();
                parametros.put("id_usuario", TxtId.getText().toString().trim());
                parametros.put("nombre", TxtCambiarNombre.getText().toString().trim());
                parametros.put("direccion", TxtCambiarDireccion.getText().toString().trim());
                parametros.put("telefono", TxtCambiarTelefono.getText().toString().trim());
                parametros.put("correo", TxtCambiarCorreo.getText().toString().trim());
                parametros.put("password", TxtCambiarPassword.getText().toString().trim());

                return parametros;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(perfil.this);
        requestQueue.add(stringRequest);
    }

    public void TraerInfo(String URL){
        String url = URL +"id="+ Id;
        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(
                Request.Method.GET,
                url,
                null,
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        String nombre, direccion, telefono, correo, password;
                        try {
                            nombre = response.getString("nombre_cliente");
                            direccion = response.getString("direccion_cliente");
                            telefono = response.getString("telefono_cliente");
                            correo = response.getString("correo");
                            password = response.getString("password_usuario");

                            TxtCambiarNombre.setText(nombre);
                            TxtCambiarDireccion.setText(direccion);
                            TxtCambiarTelefono.setText(telefono);
                            TxtCambiarCorreo.setText(correo);
                            TxtCambiarPassword.setText(password);

                        } catch (JSONException e) {
                            Toast.makeText(getApplicationContext(), e.toString() + "asd", Toast.LENGTH_LONG).show();
                        }
                        Toast.makeText(getApplicationContext(), "Data", Toast.LENGTH_LONG).show();
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(getApplicationContext(), error.toString()+"este", Toast.LENGTH_LONG).show();
                    }
                }
        );
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(jsonObjectRequest);
    }

}
