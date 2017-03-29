/*
 *inputhandler.c will read a string from a text file, and format it so that the sign can use it.
 *Finally it will send the formatted data to a program responsible for the wireless transmission.
 *Author: Jonas Iacobi
*/
#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>

#define MAXMSGLENGTH 500
#define FILENAME "C:/Users/iacob/Desktop/msg.txt"

/*
 * The getMessage function reads from the file specified and puts the content in msg.
 * The specified file should contain nothing but text. Returns a reference to the changed string.
*/
char* getMessage(char* filename, char* msg){
  int   msgLength;
  FILE *fp = fopen( filename, "r");

  if(fp){
    //Find end of text file, find file size, and go back to beginning of file.
    fseek(fp, 0, SEEK_END);
    msgLength = ftell(fp);
    fseek(fp, SEEK_SET, 0);

    //Read the entire file pointed to by fp in chunks of 2 byte to the string msg and store the read size in txtLength.
    fread(msg, sizeof(char), msgLength, fp);
    msg[msgLength] = '\0';
    fclose(fp);

    return msg;
    }
  else{
    return "Error: Message file failed to open. Please contact the poor students who made this.";
    }
}

/*
 *Runs the functions getMessage, format, and transmit,
 *as well as initializing and cleaning up the required variables.
*/
int main(){
  //Allocate memory for the message string, the same array will be overwritten for subsequent messages.
  char* message = ((char*) malloc(sizeof(char) * MAXMSGLENGTH+1));

  //Call getMessage to read the content of filename into the string message
  getMessage(FILENAME, message);
  printf("%s\n", message);

  //Free memory for the message string
  free(message);
  //Exit
  return 0;
}
