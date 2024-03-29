package com.example.proyectobacata;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.proyectobacata.administrador.viewPrincipalAdmin;
import com.example.proyectobacata.cliente.viewPrincipalCliente;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.Hashtable;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    EditText TxtCorreo, TxtPassword;
    String usuario, password;
    Button BtnIniciarSesion, btnRecuperarPassword, btnCrearCuenta;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        TxtCorreo = (EditText)findViewById(R.id.TxtCorreo);
        TxtPassword = (EditText)findViewById(R.id.TxtPassword);
        BtnIniciarSesion = (Button)findViewById(R.id.btnIniciarSesion);
        btnRecuperarPassword = (Button)findViewById(R.id.btnRecuperarPassword);
        btnCrearCuenta = (Button)findViewById(R.id.btnCrearCuenta);

        recuperarPreferencias();

        BtnIniciarSesion.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                usuario=TxtCorreo.getText().toString();
                password=TxtPassword.getText().toString();
                if(!usuario.isEmpty() && !password.isEmpty()){
                    iniciarSesion("http://192.168.0.6/aplicaciones/Componentes-Proyecto/Presentacion/inicioSesion.php");
                }
                else{
                    Toast.makeText(MainActivity.this, "no se permiten campos vacios", Toast.LENGTH_SHORT).show();
                }
            }
        });


        btnRecuperarPassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, recuperarPassword.class);
                startActivity(intent);
            }
        });

        btnCrearCuenta.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, crearCuenta.class);
                startActivity(intent);
            }
        });


    }

    public void iniciarSesion(String URL){
        StringRequest stringRequest;
        stringRequest = new StringRequest(Request.Method.POST, URL,
                new Response.Listener<String>() {

                    @Override
                    public void onResponse(String response) {
                        // En este apartado se programa lo que deseamos hacer en caso de no haber errores

                        if(response.equals("ERROR 2") || response.equals("ERROR 1")) {
                            Toast.makeText(MainActivity.this, "No existe ese registro.", Toast.LENGTH_SHORT).show();
                        }else {
                            guardarPreferencias();
//                            if(response.equals("1")){
//                                Toast.makeText(MainActivity.this, "Inicio Exitoso "+response, Toast.LENGTH_LONG).show();
//                                Intent intent = new Intent(MainActivity.this, viewPrincipalAdmin.class);
//                                startActivity(intent);
//                            }else{
                                Toast.makeText(MainActivity.this, "Inicio Exitoso "+response, Toast.LENGTH_LONG).show();
                                Intent intent = new Intent(MainActivity.this, viewPrincipalCliente.class);
                                intent.putExtra("Id", response);
                                startActivity(intent);
//                            }
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                // En caso de tener algun error en la obtencion de los datos
                Toast.makeText(MainActivity.this, ""+error, Toast.LENGTH_LONG).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {

                // En este metodo se hace el envio de valores de la aplicacion al servidor
                Map<String, String> parametros = new Hashtable<String, String>();
                parametros.put("usuario", TxtCorreo.getText().toString().trim());
                parametros.put("password", TxtPassword.getText().toString().trim());

                return parametros;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(MainActivity.this);
        requestQueue.add(stringRequest);
    }

    private  void guardarPreferencias(){
        SharedPreferences preferences =getSharedPreferences("preferenciasLogin", Context.MODE_PRIVATE);
        SharedPreferences.Editor editor=preferences.edit();
        editor.putString("usuario",usuario);
        editor.putString("password",password);
        editor.putBoolean("sesion",true);
        editor.commit();
    }
    private  void recuperarPreferencias(){
        SharedPreferences preferences =getSharedPreferences("preferenciasLogin", Context.MODE_PRIVATE);
        TxtCorreo.setText(preferences.getString("usuario",""));
        TxtPassword.setText(preferences.getString("password",""));
    }
}