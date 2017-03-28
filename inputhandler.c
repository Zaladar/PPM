//This is a preliminary version of this file for testing and learning purposes
//Author: Jonas Iacobi
#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>

char* getMessage(char* filename){
  char* msg = NULL;
  int   msgLength, txtLength;
  FILE *fp = fopen( filename, "r");

  if(fp){
    //Find end of text file, find file size, and go back to beginning of file.
    fseek(fp, 0, SEEK_END);
    msgLength = ftell(fp);
    fseek(fp, SEEK_SET, 0);

    //Allocate memory for the string
    msg = ((char*) malloc(sizeof(char) * msgLength+1));

    //Read the entire file pointed to by fp in chunks of 2 byte to the string msg and store the read size in txtLength.
    txtLength = fread(msg, sizeof(char), msgLength, fp);
    msg[msgLength] = '\0';
    fclose(fp);
    //Error check
    if(msgLength != txtLength){
      //The read failed somehow. Abort mission.
      free(msg);
      msg = NULL;
      return "Error: Length of file not equal to length of read. That's probably my fault -Jonas";
      }

    return msg;
    }
  else{
    return "Error: File not found. Please contact the poor students who made this.";
    }
}

int main(){
  char* filename = "C:/Users/iacob/Desktop/msg.txt";
  printf("%s\n", filename);
  char* message = getMessage(filename);
  printf("%s\n", message);
  return 0;
}
