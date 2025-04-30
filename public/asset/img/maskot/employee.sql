CREATE TABLE `employee` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `emp_name` varchar(100) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `employee` (`id`, `emp_name`, `salary`, `gender`, `city`, `email`) VALUES
(1, 'Yogesh', '30000', 'male', 'Bhopal', 'yogesh@makitweb.com'),
(2, 'Vishal', '28000', 'male', 'Pune', 'vishal@makitweb.com'),
(3, 'Vijay', '35000', 'male', 'Jaipur', 'vijayec@makitweb.com'),
(4, 'Rahul', '25000', 'male', 'Kanpur', 'rahul512@makitweb.com'),
(5, 'Sonarika', '50000', 'female', 'Mumbai', 'bsonarika@makitweb.com'),
(6, 'Jitentendre', '48000', 'male', 'Bhopal', 'jiten94@makitweb.com'),
(7, 'Aditya', '36000', 'male', 'Pune', 'aditya@makitweb.com'),
(13, 'Shalu', '43000', 'female', 'Bhopal', 'gshalu521@makitweb.com');