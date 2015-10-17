$(function(){
	
    // MODAL
    var Human = Backbone.Model.extend({
        urlRoot: '/user', // REST Endpoint
        defaults: { // default attributes
            name: 'Fetus',
            age: 0,
            child: ''
        },
        // If you return a string from the validate function,
        // Backbone will throw an error
        // function to validate values
        validate: function( attributes ){
            if( attributes.age < 0 && attributes.name != "Dr Manhatten" ){
              alert("You can't be negative years old");
            }
        },
        initialize: function(){
            // Initialization alert("Welcome to this world");

            //listen to changes
            this.on("change:age", function(model){
                //var age = model.get("age"); // 'Stewie Griffin'
                //alert("Changed my age to " + age );
            });
        },
        fetusCheck: function( age ){ //custom function default they are public
            if( this.get("age") == 0 ){
                alert(" Yes it's a Fetus!");
            }else{
                 alert(" No it's not a Fetus!")
            }
        }
    });

    var human = new Human();

   // console.log(human.get("age"));
    human.set({ name: "Thomas", age: 67});
   // human.fetusCheck();

    var userDetails = {
        email: 'thomasalwyndavis@gmail.com'
    };

    human.save(userDetails, { // POST information userDetails along with default values of the model
            success: function (user) {
            alert(user.toJSON());
        }
    })

    human.fetch({ // GET Request to the endpoint
        success: function (user) {
            alert(user.toJSON());
        }
    })

    //VIEWS
    var SearchView = Backbone.View.extend({
        el: '#search_container', //can give el directely or via tagName and id or class
        //tagName: "div",
        //id: "search_container",
        initialize: function(){
            //alert("Alerts suck.");
            this.render();
        },
        events: {
            "click .submit" : "doSearch",
        },
        render: function(){
          // Compile the template using underscore
          var template = _.template( $("#search_template").html(), {} );
          // Load the compiled HTML into the Backbone "el"
          this.$el.html( template );
        },
        doSearch: function( event ){
          // Button clicked, you can access the element that was clicked with event.currentTarget
          alert( "Search for " + $("#search_input").val() );
        }
    });

    // The initialize function is always called when instantiating a Backbone View.
    // Consider it the constructor of the class.

    var search_view = new SearchView(); // bind it to a DOM element

    //COLLECTIONS
    var Song = Backbone.Model.extend({
      defaults: {
        name: "Not specified",
        artist: "Not specified"
      },
      initialize: function(){
          //console.log("Music is the answer");
        }
      });

    var Album = Backbone.Collection.extend({ // COLLECTION OF MODALS
      model: Song
    });

    var song1 = new Song({ name: "How Bizarre", artist: "OMC" });
    var song2 = new Song({ name: "Sexual Healing", artist: "Marvin Gaye" });
    var song3 = new Song({ name: "Talk It Over In Bed", artist: "OMC" });

    var myAlbum = new Album([ song1, song2, song3]);
    //console.log( myAlbum.models ); // [song1, song2, song3]
	
});