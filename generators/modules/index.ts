export default {
  description: 'Generate a Module',
  
  prompts: [
    {
      type: 'input',
      name: 'moduleName',
      message: 'Module Name',
      validate: (value: string) => {
        if (!value) return 'Value is required'
        return true
      },
    },
  ],

  actions: () => {
    return []
  }
}