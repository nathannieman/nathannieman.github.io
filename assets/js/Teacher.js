/*****************************************
* Author : Nathan Nieman & Trudy-Ann Simpson
* Date : 11/8/2020
* Assignment: Teacher Class
* Purpose: Responsible for keeping track of 
* teacher's name, id, salary.
******************************************/

public class Teacher
{
   public int id;
   public int salary;
   public String firstName;
   public String lastName;
   public int salaryEarned;
   
   /**
    * To create new teacher object.
    */
    
   public Teacher(int id, String firstName, String lastName, int salary)
   {
      this.id = id;
      this.firstName = firstName;
      this.lastName = lastName;
      this.salary = salary;
      this.salaryEarned = 0;
   }
   
   /**
    * @return the id of the teacher.
    */
    
    public int getId()
    {
      return id;
    }
    
    /**
    * @return the first name of the teacher.
    */
    
   public String getFirstName()
   {
      return firstName;
   }
   
   /**
    * @return the last name of the teacher.
    */
    
   public String getLastName()
   {
      return lastName;
   }
   
   /**
    * concatenates the first and last name of the teacher.
    */
    
   public String getName()
   {
      return firstName + " " + lastName;
   }
    
    /**
    * @return the salary of the teacher.
    */
    
    public int getSalary()
    {
      return salary;
    }
    
    /**
    * Set the salary of the teacher.
    */
    
    public void setSalary(int salary)
    {
      this.salary = salary;
    }
    
    /**
    * Adds to salary
    * Removes from the total money earned by the school.
    */
    
    public void recieveSalary(int salary)
    {
      salaryEarned += salary;
      School.updateTotalMoneySpent(salary);
      School.updateTotalMoney();
    }
    
    /**
    * Prints the list as the ID and Name
    */
    
    public String toString() 
    {
      return "Teacher ID: T00" + this.getId() + "     Teacher Name: " + this.getFirstName() + " " + this.getLastName() + "       Salary: $" + this.getSalary();
    }
    

}