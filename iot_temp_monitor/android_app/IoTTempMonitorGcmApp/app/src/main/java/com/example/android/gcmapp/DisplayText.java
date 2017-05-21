package com.example.android.gcmapp;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebView;
import android.widget.TextView;

/**
 * Created by my on 7/12/2016.
 */
public class DisplayText extends Activity {
    String regId;
    @Override
    public void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.display_database);
        //String data = getIntent().getExtras().getString("key");
        regId = getIntent().getStringExtra("message");
        TextView display=(TextView)findViewById(R.id.showData);
        display.setText(regId);
//        db.insertTemp(regId);
    }

    public void readRecords(View view){

        WebView webview = (WebView) findViewById(R.id.webview);
        webview.loadUrl("http://192.168.0.117/temp-readings.php");
       /*Cursor r= db.getData(1);
        TextView display=(TextView)findViewById(R.id.showData);
        String show= r.getString(r.getColumnIndex(DatabaseHandler.TEMP_READINGS_VALUE));
        display.setText(show);
    */}

}

