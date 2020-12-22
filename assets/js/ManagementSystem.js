/*****************************************
* Author : Nathan Nieman & Trudy-Ann Simpson
* Date : 11/8/2020
* Assignment: Main Class
* Purpose: Responsible for prompting user
* to interact with the program menus.
******************************************/
import java.util.ArrayList;
import java.util.Scanner;

public class ManagementSystem
{
   public static void main(String[] args)
   {
      Scanner input = new Scanner(System.in);
      int selection;
      
      //Creating ArrayList for teachers and students
      ArrayList<Teacher> teacherList = new ArrayList<>();
      ArrayList<Student> studentList = new ArrayList<>();
      
      
      //Creating new school Grand High School      
      School grandHigh = new School(teacherList, studentList);

      do
       {
         menuPrompt();
         
         selection = input.nextInt();
         System.out.println();

         switch (selection)
         {
            //User exits program
            case 0:
               System.out.println("Good Bye");
               selection = 0;
               break;
               
               
               
            //User selects Teacher from menu
            case 1:
               menuPromptTeacher();
               selection = input.nextInt();
               System.out.println();
               
               switch (selection)
               {
                  //User exits program
                  case 0:
                     System.out.println("Good Bye");
                     selection = 0;
                     break;
                     
                  //User prints a list of teachers
                  case 1:
                     System.out.println("List of Teachers: ");
                     for (int i = 0; i < teacherList.size(); i++) 
                     {
                        System.out.println(teacherList.get(i).toString());
                     }
                     System.out.println();
                     break;

                  //User pays a teacher
                  case 2:
                     System.out.println("Enter Teacher Name ");
                     input.nextLine();
                     String teacherName = input.nextLine();
                     teacherList.stream().map(teach -> 
                     {                        
                        return teach;                        
                     }
                     ).filter(teach -> (teacherName.equals(teach.getName()))).forEachOrdered(item -> 
                     item.recieveSalary(item.getSalary()));
                     System.out.println("\nTeacher: " + teacherName + " has been paid.\n");
                     break;
                   
                   //User prints teachers pay  
                   case 3:
                     System.out.println("Enter Teacher Name ");
                     input.nextLine();
                     teacherName = input.nextLine();
                     System.out.println();
                     teacherList.stream().map(teach -> 
                     {                        
                        return teach;                        
                     }
                     ).filter(teach -> (teacherName.equals(teach.getName()))).forEachOrdered(item ->                                                      
                     System.out.println("Teacher: " + item.getName() + " is paid $" + item.getSalary() + " per check \n"));
                     break;
                  
                   //User adds a teacher
                   case 4:
                      System.out.println("Please enter the Teacher info: ID, First Name, Last Name, SALARY no commas seperated by a space ");
                      teacherList.add(new Teacher(input.nextInt(), input.next(), input.next(), input.nextInt()));
                      System.out.println();
                      System.out.println("Teacher has been added");
                      System.out.println();
                      break;
                                        
                   //User goes back to main menu
                   case 5:
                     break;
                     
                   //User selects invalid input
                   default:
                     System.out.println("Invalid input ");
                     System.out.println();
                     break;
                }
               break;
            
            
            
            //User selects Student from menu
            case 2:
               menuPromptStudent();
               selection = input.nextInt();
               System.out.println();
               
               switch (selection)
               {
                  //User exits program
                  case 0:
                     System.out.println("Good Bye");
                     selection = 0;
                     break;
                     
                  //User prints a list of students
                  case 1:
                     System.out.println("List of Students: ");
                     for (int i = 0; i < studentList.size(); i++) 
                     {
                        System.out.println(studentList.get(i).toString());
                     }
                     System.out.println();
                     break;
                  
                  //User pays a students fees
                  case 2:
                     System.out.println("Enter Student Name ");
                     input.nextLine();
                     String studentName = input.nextLine();
                     System.out.println("Enter amount paying ");
                     int amountPaid = input.nextInt();
                     studentList.stream().map(study -> 
                     {                        
                        return study;                        
                     }
                     ).filter(study -> (studentName.equals(study.getName()))).forEachOrdered(item ->
                     item.payFees(amountPaid)); 
                     System.out.println("\nStudent: " + studentName + " has made a payment of $" + amountPaid);
                     System.out.println();
                     break;
                     
                   //User prints a students total fees
                   case 3:
                     System.out.println("Enter Student Name ");
                     input.nextLine();
                     studentName = input.nextLine();
                     studentList.stream().map(study -> 
                     {                        
                        return study;                        
                     }
                     ).filter(study -> (studentName.equals(study.getName()))).forEachOrdered(item ->                  
                     System.out.println("\nStudent: " + studentName +  "    Total Fees: $" +  item.getFeesTotal()));
                     System.out.println();
                     break;
                  
                  //User prints a students total fees paid
                  case 4:
                     System.out.println("Enter Student Name ");
                     input.nextLine();
                     studentName = input.nextLine();
                     studentList.stream().map(study -> 
                     {                        
                        return study;                        
                     }
                     ).filter(study -> (studentName.equals(study.getName()))).forEachOrdered(item ->
                     System.out.println("\nStudent: " + studentName + "    Fees Paid: $" +  item.getFeesPaid()));
                     System.out.println();
                     break;
                     
                  //User prints a students total fees remaining
                  case 5:
                     System.out.println("Enter Student Name ");
                     input.nextLine();
                     studentName = input.nextLine();
                     studentList.stream().map(study -> 
                     {                        
                        return study;                        
                     }
                     ).filter(study -> (studentName.equals(study.getName()))).forEachOrdered(item ->
                     System.out.println("\nStudent: "+ studentName + "    Remaining Fees: $" + item.getRemainingFees()));
                     System.out.println();
                     break;
                     
                  //User adds a student
                  case 6:
                     System.out.println("Please enter the Student info: ID, First Name, Last Name, grade(10, 11, or 12) no commas seperated by a space ");
                     studentList.add(new Student(input.nextInt(), input.next(), input.next(), input.nextInt()));
                     System.out.println("\nStudent has been added" );
                     System.out.println();
                     break;
                     
                   //Go back to main menu
                  case 7:
                     break;
                     
                  //User selects invalid input
                  default:
                     System.out.println("Invalid input ");
                     System.out.println();
                     break;
               }   
               break;
               
               
                      
            //User selects School from menu
            case 3:
               menuPromptSchool();
               selection = input.nextInt();
               System.out.println();
               
               switch (selection)
               {
                  //User exits program
                  case 0:
                     System.out.println("Good Bye");
                     selection = 0;
                     break;
                     
                  //User checks amount earned by the school
                  case 1:
                     System.out.println("Total amount earned by the school $" + grandHigh.totalMoneyEarned);
                     System.out.println();
                     break;
                     
                  //User checks amount spent by the school
                  case 2:
                     System.out.println("Total amount spent by the school $" + grandHigh.totalMoneySpent);
                     System.out.println();
                     break;
                     
                  //User checks total School money
                  case 3:
                     System.out.println("Total school money $" + grandHigh.totalMoney);
                     System.out.println();
                     break;
                  
                  //Go back to main menu
                  case 4:
                     break;
                  
                  //User selects invalid input
                  default:
                     System.out.println("Invalid input ");
                     System.out.println();
                     break;
               }
               break;
               
               
            //User selects invalid input
            default:
               System.out.println("Invalid input ");
               System.out.println();
               break;
         }
       } while (selection != 0);
  	}
	
	private static void menuPrompt()
	{
	   System.out.println("1 .. Teacher");
		System.out.println("2 .. Student");
		System.out.println("3 .. School");
		System.out.println("0 .. Exit");
		System.out.print("Your Choice: ");
	}
   
   private static void menuPromptTeacher()
	{
	   System.out.println("1 .. Print a list of teachers");
		System.out.println("2 .. Pay a teacher");
		System.out.println("3 .. Print a teachers salary");
      System.out.println("4 .. Add Teacher");
      System.out.println("5 .. Go back");
		System.out.println("0 .. Exit");
		System.out.print("Your Choice: ");
	}
   
   private static void menuPromptStudent()
	{
	   System.out.println("1 .. Print a list of Students");
		System.out.println("2 .. Pay a students fees");
		System.out.println("3 .. Print a students total fees");
      System.out.println("4 .. Print a students total fees paid");
      System.out.println("5 .. Print a students total fees remaining");
      System.out.println("6 .. Add Student");
      System.out.println("7 .. Go back");
		System.out.println("0 .. Exit");
		System.out.print("Your Choice: ");
	}
   
   private static void menuPromptSchool()
	{
	   System.out.println("1 .. Print total amount earned by the school");
		System.out.println("2 .. Print total amount spent by the school");
      System.out.println("3 .. Print total school money");
      System.out.println("4 .. Go back");
		System.out.println("0 .. Exit");
		System.out.print("Your choice: ");
	} 
}