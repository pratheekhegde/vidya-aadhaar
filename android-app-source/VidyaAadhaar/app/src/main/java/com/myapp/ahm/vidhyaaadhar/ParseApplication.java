package com.myapp.ahm.vidhyaaadhar;

import android.app.Application;
import android.util.Log;

import com.parse.Parse;
import com.parse.ParseACL;
import com.parse.ParseObject;
import com.parse.ParseUser;

/**
 * Created by hp on 16-10-2015.
 */
public class ParseApplication extends Application {
    String TAG = "Parse_init";
    @Override
    public void onCreate() {
        super.onCreate();
        Log.e(TAG, "ParseApplication");
        // Add your initialization code here
        Parse.initialize(this, "6dlJGFlCY3dDn3cNU9d1HPKrvWzA6GhitE7FEYdt", "zbJel0zoMXEBvPr8Dhks5fdlZprlAmcFGb6ukaPP");

        ParseUser.enableAutomaticUser();
        /*
        ParseACL defaultACL = new ParseACL();

        // If you would like all objects to be private by default, remove this
        // line.
        defaultACL.setPublicReadAccess(true);

        ParseACL.setDefaultACL(defaultACL, true);*/
    }
}
