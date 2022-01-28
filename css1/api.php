
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>api data retrieved</title>
  </head>
  <body>
     <p id="xxx">
        Here it is:--------<br>
         
     </p>
      <script> 
          async function getData(){
              console.log("retrieving api data");

              const response = await fetch(apiUrl);
              data = await response.json();
              console.log('dd',data);

              var i;/*
              let problemName = new Set();

              for(i=0; i<data.subs.length; i++){

                console.log(data.subs[i][2]);
                if(data.subs[i][2] == 90){
                  problemName.add(data.subs[i][1])
                }
                  
              }
              console.log(problemName.size);*/
          }
          
          const userName = '896795';
          const problemSolved = [];

          apiUrl = `https://kenkoooo.com/atcoder/atcoder-api/v3/user/submissions?user=misir&from_second=1451020043`;
          getData();

          
      </script>
  </body>
</html>