$.ajax({
    url:"/css/common.css",
    dataType:"text",
    success:(data)=> {
      $("head").append(`<style>${data}`);
      $("head").append(`<style>@media (max-width:500px) { ${data.replace(/([0-9]+)px/g, (v) => v.replace('px', '')/5+'vw')} }</style>`);
    }
  });