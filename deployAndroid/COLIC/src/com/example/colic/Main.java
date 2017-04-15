package com.example.colic;
import org.apache.cordova.*;

import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.view.Menu;

public class Main extends DroidGap {

	@Override
	public void onCreate(Bundle savedInstanceState) {
		 super.onCreate(savedInstanceState);
	     if(isOnline()){super.loadUrl("file:///android_asset/www/index.html");} else 
	     {
	    	 AlertDialog alertDialog = new AlertDialog.Builder(this).create();
	    	 alertDialog.setTitle("No Internet Connection");
	    	 alertDialog.setMessage("Please Check your Internet Setting");
	    	 alertDialog.setButton("OK", new DialogInterface.OnClickListener() {
	    	 public void onClick(DialogInterface dialog, int which) {
	    		 //exit app (to home)
	    		 Intent intent = new Intent(Intent.ACTION_MAIN);
	    		 intent.addCategory(Intent.CATEGORY_HOME);
	    		 intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
	    		 startActivity(intent);
		    	 }
	    	 });
	    	 alertDialog.setIcon(R.drawable.icon);
	    	 alertDialog.show();
	     }
	}
	
	public boolean isOnline() {
	    ConnectivityManager cm =
	        (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
	    NetworkInfo netInfo = cm.getActiveNetworkInfo();
	    if (netInfo != null && netInfo.isConnectedOrConnecting()) {
	        return true;
	    }
	    return false;
	}
}
