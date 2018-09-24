<h3>SandBox Mode</h3>

On load of index.php the code will determine if the user is using a mobile device (redirect if true) and if there are any X and Y values. 

If no X and Y values the user will be prompted to input these. They can also toggle Map mode (Map overlay). 

This will then produce and X by Y grid of Squares where the user will need to choose a Square. A Winning square is calculated randomly [rand(1, x value * Y value)] every time.

They have one shot at finding the winning square. 

Win - Fireworks and a You Won message. 
Loose - you are shown the path to the Winning Square. 
