package com.example.proyectobacata.cliente;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.proyectobacata.MainActivity;
import com.example.proyectobacata.R;
import com.example.proyectobacata.recuperarPassword;

public class viewPrincipalCliente extends AppCompatActivity {
    TextView LabelData;
    Button btnHacerReserva, btnHistorial, btnPerfil;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_principal_cliente2);
        LabelData = (TextView)findViewById(R.id.labelData);
        String Id = getIntent().getStringExtra("Id");

        LabelData.setText(Id);
        btnHacerReserva = (Button)findViewById(R.id.btnHacerReserva);
        btnHistorial = (Button)findViewById(R.id.btnHistorial);
        btnPerfil = (Button)findViewById(R.id.btnPerfil);

        btnHacerReserva.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(viewPrincipalCliente.this, hacerReserva.class);
                startActivity(intent);
            }
        });

        btnHistorial.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(viewPrincipalCliente.this, historial.class);
                startActivity(intent);
            }
        });

        btnPerfil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(viewPrincipalCliente.this, perfil.class);
                intent.putExtra("Id", Id);
                startActivity(intent);
            }
        });

    }
}