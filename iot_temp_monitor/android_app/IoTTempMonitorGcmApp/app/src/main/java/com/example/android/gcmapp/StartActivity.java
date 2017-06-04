package com.example.android.gcmapp;

import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;

/**
 * Created by my on 7/12/2016.
 */public class StartActivity  extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        // TODO Auto-generated method stub
        super.onCreate(savedInstanceState);

        SharedPreferences settings = getSharedPreferences("prefs", 0);
        boolean firstRun = settings.getBoolean("firstRun", false);
        if (firstRun == false)//if running for first time
        //Splash will load for first time
        {
            SharedPreferences.Editor editor = settings.edit();
            editor.putBoolean("firstRun", true);
            editor.commit();
            Intent i = new Intent(StartActivity.this, Register.class);
            startActivity(i);
            finish();
        } else {

            Intent a = new Intent(StartActivity.this, DisplayText.class);
            startActivity(a);
            finish();
        }
    }
}

