def newLineFile(filename):
  source_path = filename
  new_filename = filename.split('.')[0] + "_linebreak.txt"
  target_path = new_filename

  with open(source_path, 'r') as file:
    text = file.read().strip()
    sentences = text.split('.')
    with open(target_path, 'w') as output:
      for sentence in sentences:
        if sentence.startswith(' '):
          sentence = sentence[1:]
        output.write(sentence + ".\n\n")

newLineFile("transcript_text.txt")