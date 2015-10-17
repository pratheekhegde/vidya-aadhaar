package com.myapp.ahm.vidhyaaadhar;

import android.app.ProgressDialog;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.parse.LogInCallback;
import com.parse.ParseAnonymousUtils;
import com.parse.ParseException;
import com.parse.ParseUser;

public class Login extends AppCompatActivity implements View.OnClickListener {
    Button login;
    EditText et_us,et_pw;
    String TAG = "Login";
    String us,pw;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        et_us = (EditText)findViewById(R.id.username);
        et_pw = (EditText)findViewById(R.id.password);
        login = (Button)findViewById(R.id.login);
        login.setOnClickListener(this);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_login, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @Override
    public void onClick(View v) {
         us = et_us.getText().toString();
         pw = et_pw.getText().toString();
        Log.e(TAG,"username="+us+"password"+pw);
            if(!us.isEmpty()&&!pw.isEmpty()) {
                //ParseUser.logInInBackground(us,pw,user(e)->{

                //});
                final ProgressDialog progress = new ProgressDialog(this);
                progress.setTitle("Please wait..) ");
                progress.show();
                // Send data to Parse.com for verification
                ParseUser.logInInBackground("test","test",
                        new LogInCallback() {
                            //ParseUser userP;
                            //String userS = userP.getUsername().toString();
                            public void done(ParseUser user, ParseException e) {
                               // Log.e(TAG,"user="+userS);
                                //Log.e(TAG,"user="+user.toString());
                                progress.dismiss();
                                //if (user != null) {
                                if(user!=null){
                                    // If user exist and authenticated, send user to Welcome.class
                                    Intent intent = new Intent(
                                            Login.this,
                                            Profile.class);
                                    startActivity(intent);
                                    Toast.makeText(getApplicationContext(),
                                            "Successfully Logged in",
                                            Toast.LENGTH_LONG).show();
                                  //finish();
                                } else {
                                    Toast.makeText(
                                            getApplicationContext(),
                                            "No such user exists",
                                            Toast.LENGTH_LONG).show();
                                    switch (e.getCode()) {
                                        case ParseException.USERNAME_TAKEN:
                                            Log.d("Testing","Sorry, this username has already been taken.");
                                            break;
                                        case ParseException.USERNAME_MISSING:
                                            Log.d("Testing","Sorry, you must supply a username to register.");
                                            break;
                                        case ParseException.PASSWORD_MISSING:
                                            Log.d("Testing","Sorry, you must supply a password to register.");
                                            break;
                                        case ParseException.OBJECT_NOT_FOUND:
                                            Log.d("Testing","Sorry, those credentials were invalid.");
                                            break;
                                        case ParseException.CONNECTION_FAILED:
                                            Log.d("Testing","Internet connection was not found. Please see your connection settings.");
                                            break;
                                        default:
                                            Log.d("Testing",e.getLocalizedMessage());
                                            break;
                                    }
                                }
                            }
                        });
                }

            else{
                // Prompt user to enter credentials
                Toast.makeText(getApplicationContext(),
                        "Please enter the credentials!", Toast.LENGTH_LONG)
                        .show();
            }
        }
    }

