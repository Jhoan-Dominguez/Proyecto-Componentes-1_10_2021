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

import java.util.Hashtable;
import java.util.Map;

public class recuperarPassword extends AppCompatActivity {
    EditText TxtRecuperarCorreo, TxtRecuperarIdUsuario, TxtRecuperarPassword;
    Button btnRecuperarP;
    String correo, id, newPass;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_recuperar_password);

        TxtRecuperarCorreo = (EditText)findViewById(R.id.TxtRecuperarCorreo);
        TxtRecuperarIdUsuario = (EditText)findViewById(R.id.TxtRecuperarIdUsuario);
        TxtRecuperarPassword = (EditText)findViewById(R.id.TxtRecuperarPassword);

        btnRecuperarP = (Button)findViewById(R.id.btnRecuperarP);

        btnRecuperarP.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                id=TxtRecuperarIdUsuario.getText().toString();
                newPass=TxtRecuperarPassword.getText().toString();
                correo=TxtRecuperarCorreo.getText().toString();

                if(!id.isEmpty() && !newPass.isEmpty() && !correo.isEmpty()){
                    recuperarPassword("http://192.168.0.5/aplicaciones/Componentes-Proyecto/Presentacion/recuperarPassword.php");
                }
                else{
                    Toast.makeText(recuperarPassword.this, "no se permiten campos vacios", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    public void recuperarPassword(String URL){
        StringRequest stringRequest;
        stringRequest = new StringRequest(Request.Method.POST, URL,
                new Response.Listener<String>() {

                    @Override
                    public void onResponse(String response) {
                        // En este apartado se programa lo que deseamos hacer en caso de no haber errores
                        if(response.equals("Password Update")){
                            Toast.makeText(getApplicationContext(), "Password Update", Toast.LENGTH_SHORT).show();
                            Intent intent = new Intent(recuperarPassword.this, MainActivity.class);
                            startActivity(intent);
                        }else{
                            Toast.makeText(recuperarPassword.this, response, Toast.LENGTH_LONG).show();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                // En caso de tener algun error en la obtencion de los datos
                Toast.makeText(recuperarPassword.this, ""+error, Toast.LENGTH_LONG).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {

                // En este metodo se hace el envio de valores de la aplicacion al servidor
                Map<String, String> parametros = new Hashtable<String, String>();
                parametros.put("id", TxtRecuperarIdUsuario.getText().toString().trim());
                parametros.put("correo", TxtRecuperarCorreo.getText().toString().trim());
                parametros.put("newPass", TxtRecuperarPassword.getText().toString().trim());

                return parametros;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(recuperarPassword.this);
        requestQueue.add(stringRequest);
    }
}