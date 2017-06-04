package com.example.android.gcmapp;

import android.content.Context;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    ShareWithServer appUtil;
    String regId;
    AsyncTask shareRegidTask;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        appUtil = new ShareWithServer();

        regId = getIntent().getStringExtra("regId");
        //regId = getIntent().getStringExtra("message");
        Log.d("MainActivity", "regId: " + regId);

        //getLastIndexOfs=regId.lastIndexOf("s");
        //msg=regId.substring(getLastIndexOfs);
        //TextView displayTemp = (TextView) findViewById(R.id.lblMessage);
        //  displayTemp.setText("Temperature is " + regId);

        final Context context = this;
        shareRegidTask = new AsyncTask() {
            @Override
            protected Object doInBackground(Object[] params) {
                String result = appUtil.shareRegIdWithAppServer(context, regId);
                return result;

            }


            //@Override
            protected void onPostExecute(String result) {
                shareRegidTask = null;
                Toast.makeText(getApplicationContext(), result,
                        Toast.LENGTH_LONG).show();
            }

        };
        shareRegidTask.execute(null, null, null);

        /*Intent newIntent=new Intent(this,DisplayDatabase.class);
        newIntent.putExtra("key",regId);
        startActivity(newIntent);*/



    }

}
