package com.myapp.ahm.vidhyaaadhar;

import com.parse.ParseClassName;
import com.parse.ParseObject;

/**
 * Created by hp on 17-10-2015.
 */
@ParseClassName("User")
public class my_profile extends ParseObject {

    public String getName(){
        return getString("username");
    }
    public String getPhone(){
        return getString("phone");
    }
    public String getEmail(){
        return getString("email");
    }
    public String getGender(){
        return getString("gender");
    }

}
