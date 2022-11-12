const COMPONENT_PATH = '../src/modules'
import usePushFiles from './hooks/usePushFiles'

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

  actions: (data: any) => {
    const { pushFile } = usePushFiles()
    const pathTemplate = './modules/templates'
    const componentPath = COMPONENT_PATH +'/{{moduleName}}'

    const files = () => {
      const arrayFiles = []

      arrayFiles.push(
        pushFile({
          path: `${componentPath}`,
          template: 'indexModule.hbs',
          name: 'index.php',
        }),
      )

      // Entity
      arrayFiles.push(
        pushFile({
          path: `${componentPath}/infra/entities`,
          template: 'indexEntity.hbs',
          name: 'index.php',
        }),
      )

      arrayFiles.push(
        pushFile({
          path: `${componentPath}/infra/entities`,
          template: 'entity.hbs',
          name: '{{pascalCase moduleName}}.entity.php',
        }),
      )


      return arrayFiles
    }

    const action = [] as any

    files().forEach((file) => {
      const createFile = {
        type: 'add',
        path: `${file.path}/${file.name}`,
        templateFile: `${pathTemplate}/${file.template}`,
        force: true,
      }

      action.push(createFile)
    })

    const updateFile = {
      type: 'append',
      path: `${COMPONENT_PATH}/index.php`,
      template: "require_once('{{moduleName}}/index.php');",
    }
    action.push(updateFile)

    return action
  }
}