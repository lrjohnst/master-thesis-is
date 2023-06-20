# Note: you need to be using OpenAI Python v0.27.0 for the code below to work
import openai
openai.api_key = "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"
audio_file= open("interview.mp3", "rb")
transcript = openai.Audio.transcribe("whisper-1", audio_file)
with open('transcript_text.txt', 'w') as txt_file:
    txt_file.write(str(transcript))
print(str(transcript))