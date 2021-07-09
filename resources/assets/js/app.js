new vue({

  el: '#crud',
  created: function(){
  	this.getkeeps();
  },

  data: {
  	keeps:[]
  },

  methods: {
  	getKeeps: function () {
  		var urlkeeps= 'movies';
  		axios.get(urlkeeps).then(response => {
  			this.keeps =response.data
  		});
  	} 
  }

});