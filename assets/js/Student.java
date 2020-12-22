/*****************************************
* Author : Nathan Nieman & Trudy-Ann Simpson
* Date : 11/8/2020
* Assignment: Student Class
* Purpose: Responsible for keeping track of
* students fees, name, grade & fees paid.
******************************************/

public class Student
{
   public int id;
   public int grade;
   public int feesPaid;
   public int feesTotal;
   public String firstName;
   public String lastName;
   
   /**
    * To create new student object by initializing the values.
    * Fees for every student is $10,000.
    * Fees paid initially is 0.
    */
   
   public Student(int id, String firstName, String lastName, int grade)
   {
      feesPaid = 0;
      feesTotal = 10000;
      this.id = id;
      this.firstName = firstName;
      this.lastName = lastName;
      this.grade = grade;
   }
   
   /**
    * Used to update the student's grade.
    */
    
   public void setGrade(int grade)
   {
      this.grade = grade;
      
   }
   
   /**
    * Keep adding the fees to feesPaid.
    * Add the fees to the fees paid.
    * School will receive the funds.
    */
    
   public void payFees(int fees)
   {
      feesPaid += fees;
      School.updateTotalMoneyEarned(feesPaid);
      School.updateTotalMoney();
   }
   
   /**
    * @return id of the student.
    */
    
   public int getId()
   {
      return id;
   }
   
   /**
    * @return the first name of the student.
    */
    
   public String getFirstName()
   {
      return firstName;
   }
   
   /**
    * @return the last name of the student.
    */
    
   public String getLastName()
   {
      return lastName;
   }
   
   /**
    * concatenates the first and last name of the student.
    */
    
   public String getName()
   {
      return firstName + " " + lastName;
   }
   
   /**
    * @return the grade of the student.
    */
    
   public int getGrade()
   {
      return grade;
   }
   
   /**
    * @return the fees paid by the student.
    */
    
   public int getFeesPaid()
   {
      return feesPaid;
   }
   
   /**
    * @return the total fees of the student.
    */
    
   public int getFeesTotal() 
   {
      return feesTotal;
   }
   
   /**
    * @return the remaining fees.
    */

   public int getRemainingFees()
   {
      return feesTotal -= feesPaid;
   }
   
   /**
    * Prints the list as the ID and Name
    */
   
   public String toString() 
    {
      return "Student ID: S00" + this.getId() +"      Student Name: " + this.getFirstName() + " " +  this.getLastName() + "      Grade: " + this.getGrade();
    }
}