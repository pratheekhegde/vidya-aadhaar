package com.myapp.ahm.vidhyaaadhar;

import android.content.Intent;
import android.graphics.drawable.ClipDrawable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

import com.parse.ParseAnonymousUtils;
import com.parse.ParseUser;

public class Signin extends AppCompatActivity implements View.OnClickListener {

    Button sign;
    ImageView iv1;
    //ClipDrawable mImageDrawable;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_signin);

        sign = (Button) findViewById(R.id.signin);
        sign.setOnClickListener(this);
        //iv1 = (ImageView)findViewById(R.id.iv1);
        /*
        mImageDrawable = (ClipDrawable) iv1.getDrawable();
        mImageDrawable.setLevel(5000);
        */
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_signin, menu);
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
        // Determine whether the current user is an anonymous user
        if (ParseAnonymousUtils.isLinked(ParseUser.getCurrentUser())) {
            // If user is anonymous, send the user to LoginSignupActivity.class
            startActivity(new Intent(Signin.this, Login.class));
       //     finish();
        } else {
            // If current user is NOT anonymous user
            // Get current user data from Parse.com
            ParseUser currentUser = ParseUser.getCurrentUser();
            if (currentUser != null) {
                // Send logged in users to Welcome.class
                startActivity(new Intent(Signin.this, Profile.class));
         //       finish();
            } else {
                // Send user to LoginSignupActivity.class
                startActivity(new Intent(Signin.this, Login.class));
           //     finish();
            }

        }
    }
}
