package com.myapp.ahm.vidhyaaadhar;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.util.Log;
import android.widget.Toast;

import com.parse.LogInCallback;
import com.parse.ParseException;
import com.parse.ParseUser;

import java.io.BufferedWriter;
import java.io.IOException;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;


/**
 * Created by hp on 16-10-2015.
 */
public class login_post extends AsyncTask<String,String,Void> {
    String TAG = "login_post";
    private ProgressDialog dialog;

    public login_post(Login activity) {
        dialog = new ProgressDialog(activity);
    }
    @Override
    protected void onPreExecute() {
        dialog.setMessage("Please wait.");
        dialog.show();
        super.onPreExecute();
    }

    @Override
    protected Void doInBackground(String... params) {
        String us = params[0];
        String pw = params[1];
        String str_url="";
        URL url = null;
        // Send data to Parse.com for verification
        ParseUser.logInInBackground(us,pw,
                new LogInCallback() {
                    public void done(ParseUser user, ParseException e) {
                        if (user != null) {
                            // If user exist and authenticated, send user to Welcome.class
/*
                            Toast.makeText(getApplicationContext(),
                                    "Successfully Logged in",
                                    Toast.LENGTH_LONG).show();
                            finish();
                        } else {
                            Toast.makeText(
                                    getApplicationContext(),
                                    "No such user exist, please signup",
                                    Toast.LENGTH_LONG).show();*/
                        }
                    }
                });
        //try {
            /*
            curl -X GET \
            -H "X-Parse-Application-Id: 6dlJGFlCY3dDn3cNU9d1HPKrvWzA6GhitE7FEYdt" \
            -H "X-Parse-REST-API-Key: zJVeYPOAPBq4pDJOeYM7eFbefLeDgs6KU2cJ3zGi" \
            -H "X-Parse-Revocable-Session: 1" \
            -G \
            --data-urlencode 'us' \
            --data-urlencode 'pw' \
            https://api.parse.com/1/login
            */
            /*
            url = new URL(str_url);
            HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            OutputStream OS = httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(OS, "UTF-8"));
            Log.e(TAG, "connected");
            String data = URLEncoder.encode("us", "UTF-8") + "=" + URLEncoder.encode(us, "UTF-8") + "&" +
                    URLEncoder.encode("pw", "UTF-8") + "=" + URLEncoder.encode(pw, "UTF-8");
            bufferedWriter.write(data);
            Log.e(TAG,"posted");
            bufferedWriter.flush();
            bufferedWriter.close();
            OS.close();
            */


        //}
         /*catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e){
            e.printStackTrace();
        }*/

        return null;
    }

    @Override
    protected void onPostExecute(Void aVoid) {
        if (dialog.isShowing()) {
            dialog.dismiss();
        }
        super.onPostExecute(aVoid);
    }
}
