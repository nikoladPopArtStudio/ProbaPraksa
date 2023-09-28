document.addEventListener('DOMContentLoaded', () => 
{
    const deleteButtons = document.querySelectorAll('.deleteButton');
  
    deleteButtons.forEach(deleteButton => 
    {
      deleteButton.addEventListener('click', (event) => 
      {
        event.preventDefault();
  
        const studentId = deleteButton.parentElement.querySelector('.studentId').innerText;
  
        const xhr = new XMLHttpRequest();
        const url = 'http://localhost/praksaprojekat/delete.php';
  
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
        xhr.onload = function () 
        {
          if (xhr.status >= 200 && xhr.status < 400) 
          {
            // Success!
            console.log(xhr.responseText);
            deleteButton.parentElement.parentElement.remove();
          } 
          else 
          {
            // We reached our target server, but it returned an error
            console.error('Error:', xhr.responseText);
          }
        };
  
        xhr.onerror = function () 
        {
          // There was a connection error of some sort
          console.error('Network Error');
        };
  
        // Send the request
        xhr.send(`student_id=${studentId}`);
      });
    });
  });
  