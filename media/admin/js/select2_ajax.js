$(document).ready(function(){
 $(".change-select2-ajax").select2({
  ajax: {
    // url: "https://api.github.com/search/repositories?q=a",
    url : rootUrl+'/admin/users/search_users',
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      params.page = params.page || 1;

      return {
        results: data.items,
        pagination: {
          more: (params.page * 10) < data.total_count
        }
      };
    },
    cache: true
  },
  placeholder: 'Search for a repository',
  minimumInputLength: 1,
  templateResult: formatRepo,
  templateSelection: formatRepoSelection
});

function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var $container = $(
    "<div class='select2-result-repository clearfix'>" +
      "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'></div>" +
      "</div>" +
    "</div>"
  );

  $container.find(".select2-result-repository__title").text(repo.firstname + " " + repo.lastname + "( email : " +repo.email+
    ")");

  return $container;
}

function formatRepoSelection (repo) {
    if(repo.firstname != undefined && repo.lastname != undefined && repo.email != undefined){
        return repo.firstname + " " + repo.lastname + "( email :" +repo.email+")" || repo.text;
    }else {
        return repo.text;
    }
}   
})
