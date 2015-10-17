package com.myapp.ahm.vidhyaaadhar;

import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.parse.FindCallback;
import com.parse.GetCallback;
import com.parse.ParseException;
import com.parse.ParseObject;
import com.parse.ParseQuery;
import com.parse.ParseUser;

import java.util.List;

public class Profile extends AppCompatActivity implements View.OnClickListener {
    Button logout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        logout = (Button)findViewById(R.id.logout);

        final TextView txtuser = (TextView) findViewById(R.id.name);
        final TextView ph = (TextView) findViewById(R.id.ph_no);
        final TextView em = (TextView)findViewById(R.id.em_id);
        TextView gn = (TextView)findViewById(R.id.gender);

        String us,phs,ems,gns;

        logout.setOnClickListener(this);

        ParseQuery query = ParseQuery.getQuery("User");
        query.whereEqualTo("username", null);
        query.findInBackground(new FindCallback() {

            @Override
            public void done(Object o, Throwable throwable) {
                o.getClass();

            }

            @Override
            public void done(List objects, ParseException e) {
/*

                if (objects != null) {
                    if (objects.get(position).getString("username") != null) {
                        txtuser.setText(objects.get(position).getString("username")
                                .toString());
                        if (objects.get(position).getString("phone") != null) {
                            ph.setText(objects.get(position)
                                    .getString("password").toString());
                            if (objects.get(position).getString("email") != null) {
                                em.setText(objects.get(position).getString("email")
                                        .toString());
                            }

                        } else {
                            txtuser.setText("username");
                            ph.setText("password");
                            em.setText("email");
                        }*/
            }
            /*
            @Override
            public void done(final List<ParseObject> objects, ParseException e) {
                // TODO Auto-generated method stub
                if (e == null) {
                    Log.d("username", "retreived" + objects.size() + " username");
                    ListView playerlist = (ListView) findViewById(android.R.id.list);

                    class PlayerListAdapter extends BaseAdapter {

                        private List<ParseObject> objects;

                        private Context context;

                        public PlayerListAdapter(FindCallback findCallback,
                                                 List<ParseObject> objects, Context context) {
                            // TODO Auto-generated constructor stub
                            super();
                            this.context = context;
                            this.objects = objects;
                        }

                        @Override
                        public int getCount() {
                            // TODO Auto-generated method stub
                            if (objects != null) {
                                return objects.size();
                            }
                            return 0;

                        }

                        @Override
                        public Object getItem(int position) {
                            // TODO Auto-generated method stub
                            return objects.get(position);
                        }

                        @Override
                        public long getItemId(int position) {
                            // TODO Auto-generated method stub
                            return 0;
                        }

                        @Override
                        public View getView(int position, View convertView, ViewGroup parent) {
                            // TODO Auto-generated method stub
                            View view = convertView;
                            TextView ausername = null;
                            TextView apassword = null;
                            TextView aemail = null;

                            if (view == null) {
                                LayoutInflater inflater = getLayoutInflater();
                                view = inflater.inflate(R.layout.activity_profile, parent, false);
                            } else {
                                view = convertView;
                            }
                            ausername = (TextView) findViewById(R.id.username);
                            apassword = (TextView) findViewById(R.id.password);
                            aemail = (TextView) findViewById(R.id.em_id);

                            if (objects != null) {
                                if (objects.get(position).getString("username") != null) {
                                    ausername.setText(objects.get(position).getString("username")
                                            .toString());
                                    if (objects.get(position).getString("password") != null) {
                                        apassword.setText(objects.get(position)
                                                .getString("password").toString());
                                        if (objects.get(position).getString("email") != null) {
                                            aemail.setText(objects.get(position).getString("email")
                                                    .toString());
                                        }

                                    } else {
                                        ausername.setText("username");
                                        apassword.setText("password");
                                        aemail.setText("email");
                                    }

                                }

                            }
                            return view;

                        }

                    }

                    playerlist.setAdapter(new PlayerListAdapter(this, objects, null));

                } else {
                    Log.d("username", "Error: " + e.getMessage());
                }

            }

        });

        //query.whereEqualTo("objectId", text.get(0).getParseObject(""));
        query.getInBackground(String.valueOf(new GetCallback<ParseObject>() {
            @Override
            public void done(ParseObject object, ParseException e) {
                em.setText(object.getString("email").toString());
                }
            }));*/
        });


    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_profile, menu);
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
        ParseUser.logOut();
        Toast.makeText(getApplicationContext(),
                "Logged out",
                Toast.LENGTH_LONG).show();
                finish();
                System.exit(0);
    }
}
        /*
        ParseUser user = ParseUser.getCurrentUser();

        String struser = user.getUsername().toString();
        txtuser.setText(struser);
/*
        String ph = user.get().toString();
        txtuser.setText(ph);*/
                /*
                if (e == null) {
                    us = object.getString("name").toString();
                    ph= object.getString("cuisine").toString();
                    restLocation = object.getString("location");
                    restAddress = object.getString("address");
                } else {
                    e.printStackTrace();
                }*/
                /*
                if (object != null) {

                    if (object.getString("username") != null) {
                        txtuser.setText(object.getString("username")
                                .toString());
                        if (object.get(position).getString("password") != null) {
                            apassword.setText(objects.get(position)
                                    .getString("password").toString());
                            if (objects.get(position).getString("email") != null) {
                                aemail.setText(objects.get(position).getString("email")
                                        .toString());
                            }

                        } else {
                            ausername.setText("username");
                            apassword.setText("password");
                            aemail.setText("email");
                        }

                    }*/