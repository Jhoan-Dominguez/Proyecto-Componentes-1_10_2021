package com.example.proyectobacata;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
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
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.proyectobacata.administrador.viewPrincipalAdmin;
import com.example.proyectobacata.cliente.viewPrincipalCliente;

import java.util.Hashtable;
import java.util.Map;

public class crearCuenta extends AppCompatActivity {
    EditText TxtCrearNombre, TxtCrearDireccion, TxtCrearTelefono, TxtCrearCorreo, TxtCrearPassword;
    Button btnCrear;
    String nombre, direccion, telefono, correo, password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_crear_cuenta);

        TxtCrearNombre = (EditText)findViewById(R.id.TxtCrearNombre);
        TxtCrearDireccion = (EditText)findViewById(R.id.TxtCrearDireccion);
        TxtCrearTelefono = (EditText)findViewById(R.id.TxtCrearTelefono);
        TxtCrearCorreo = (EditText)findViewById(R.id.TxtCrearCorreo);
        TxtCrearPassword = (EditText)findViewById(R.id.TxtCrearPassword);

        btnCrear = (Button)findViewById(R.id.btnCrear);

        btnCrear.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                nombre=TxtCrearNombre.getText().toString();
                direccion=TxtCrearDireccion.getText().toString();
                telefono=TxtCrearTelefono.getText().toString();
                correo=TxtCrearCorreo.getText().toString();
                password=TxtCrearPassword.getText().toString();

                if(!nombre.isEmpty() && !direccion.isEmpty() && !telefono.isEmpty() && !correo.isEmpty() && !password.isEmpty()){
                    crearCuenta("http://192.168.0.5/aplicaciones/Componentes-Proyecto/Presentacion/crearUsuario.php");
                }
                else{
                    Toast.makeText(crearCuenta.this, "no se permiten campos vacios", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    public void crearCuenta(String URL){
        StringRequest stringRequest;
        stringRequest = new StringRequest(Request.Method.POST, URL,
                new Response.Listener<String>() {

                    @Override
                    public void onResponse(String response) {
                        // En este apartado se programa lo que deseamos hacer en caso de no haber errores
                        if(response.equals("Usuario Registrado con Exito")){
                            Toast.makeText(getApplicationContext(), "Registro Exitoso", Toast.LENGTH_SHORT).show();
                            Intent intent = new Intent(crearCuenta.this, MainActivity.class);
                            startActivity(intent);
                        }else{
                            Toast.makeText(crearCuenta.this, response, Toast.LENGTH_LONG).show();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                // En caso de tener algun error en la obtencion de los datos
                Toast.makeText(crearCuenta.this, ""+error, Toast.LENGTH_LONG).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {

                // En este metodo se hace el envio de valores de la aplicacion al servidor
                Map<String, String> parametros = new Hashtable<String, String>();
                parametros.put("nombre", TxtCrearNombre.getText().toString().trim());
                parametros.put("direccion", TxtCrearDireccion.getText().toString().trim());
                parametros.put("telefono", TxtCrearTelefono.getText().toString().trim());
                parametros.put("correo", TxtCrearCorreo.getText().toString().trim());
                parametros.put("password", TxtCrearPassword.getText().toString().trim());

                return parametros;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(crearCuenta.this);
        requestQueue.add(stringRequest);
    }

}